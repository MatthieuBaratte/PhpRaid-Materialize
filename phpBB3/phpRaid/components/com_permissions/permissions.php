<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// verify permissions
if(!$pMain->checkPerm('edit_permissions')) {
	pRedirect('index.php?option=com_login&task=login');
}

// define permission types
$sets = array(
			// headers
					// items
			'general' =>
				array(
					'allow_signup',
					'view_members',
					'view_raids',
					'view_roster',
				),
			'member_profiles' =>
				array(
					'view_history_own',
					'edit_characters_own',
					'edit_announcements_own',
					'edit_raids_own',
					'edit_subscriptions_own',
				),
			'administration' =>
				array(
					'allow_backups',
					'edit_configuration',
					'edit_attributes',
					'edit_definitions',
					'edit_genders',
					'edit_guilds',
					'edit_groups',
					'edit_meetings',
					'edit_permissions',
					'edit_roles',
				),
			'moderation' =>
				array(
					'view_history_any',
					'edit_announcements_any',
					'edit_characters_any',
					'delete_members',
					'edit_raids_any',
					'edit_subscriptions_any',
					'edit_raid_templates'
				),
		);

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(empty($task) || $task == '') {
	// output announcements list
	$sql['SELECT'] = '*';
	$sql['FROM'] = 'groups';
	$group_cursor = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

	// array for data
	$phpr_a = array();

	while($data = $db_raid->sql_fetchrow($group_cursor)) {
		// admin options
		$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option='.$option.'&task=edit&id='.$data['permission_id'].'"><i class="material-icons md-12">edit</i></a> ';

		$sql['SELECT'] = 'COUNT(*) AS count';
		$sql['FROM'] = 'profile';
		$sql['WHERE'] = 'group_id = '.$data['group_id'];
		$db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$members = $db_raid->fetch();

		$sql["SELECT"] = "COUNT(*) AS count";
		$sql["FROM"] = "permissions";
		$sql["WHERE"] = "group_id = {$data['group_id']}";
		$db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$permissions = $db_raid->fetch();

		if(empty($members))
			$members = '0';

		if(empty($permissions))
			$permissions = '0';

		// setup array for data output
		array_push($phpr_a,
			array(
				'name'=>$data['group_name'],
				'members'=>'<a href="index.php?option=com_groups&task=details&id='.$data['group_id']. '">'.$members['count'].'</a>',
				'permissions'=>$permissions['count'],
				'edit'=>'<a class="btn btn--table-edit btn--outline" href="index.php?option='.$option.'&task=details&id='.$data['group_id'].'"><i class="material-icons md-12">edit</i></a>'
			)
		);
	}

	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&amp;Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink(ALLOW_HOVER_INDEX, '', array());
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option);

	// setup column headers
	$report->addOutputColumn('name', $pLang['name'],'text-center','text-left', 'null', 'null');
	$report->addOutputColumn('members', $pLang['members'],'text-center','text-center', 'null', 'null');
	$report->addOutputColumn('permissions', $pLang['permissions'],'text-center','text-center', 'null', 'null');
	$report->addOutputColumn('edit','<i class="material-icons md-16">edit</i>','text-center','text-center', 'null', 'null');

	// put data into variable for output
	$output = $report->getListFromArray($phpr_a);

	$p->assign('create_new', $pLang['create_new']);
	$p->assign('header', $pLang['pHeader']);
	$p->assign('output', $output);
	$p->display(RAIDER_TEMPLATE_PATH.'permissions.tpl');
} else if($task == 'details') {
	$i = 0;
	$j = 0;

	// get data for all values of checkboxes from database
	$sql["SELECT"] = "*";
	$sql["FROM"] = "permissions";
	$sql["WHERE"] = "group_id={$id}";
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	// variable to store check defaults
	$check_defaults = array();
	while($data = $db_raid->fetch()) {
		if($data['permission_value'] == 1)
			$check_defaults[$data['permission_name']] = 'checked';
	}

	// generate permissions details listing
	$d_output = '';

	$d_output .= '<form method="POST" action="index.php?option='.$option.'&task=add&id='.$id.'">';
	$d_output .= '<div class="card-block sectionCard--content">';
	$d_output .= '<div class="row">';

	// setup headers
	foreach($sets as $key=>$value) {
		
		$d_output .= '<div class="col-12 col-sm-6">';
		
		$d_output .= '<span class="content--header">'.$pLang['pSet_'.$key].'</span>';
		foreach($value as $key2=>$value2) {
			$d_output .= '<div class="form-group row form-group-row">';
			$d_output .= '<div class="col-1">';
			$d_output .= '<a tabindex="'.$data['raid_id'].'" class="btn btn--table-info btn--outline" data-toggle="popover" data-placement="right" data-poload="help.php?topic='.$value2.'"><i class="material-icons md-14">help_outline</i></a>';
			$d_output .= '</div>';
			$d_output .= '<label for="'.$value2.'" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">';
			$d_output .= $pLang['pSet_'.$value2].' :</label>';
			$d_output .= '<div class="col-1 col-sm-4 col-md-3">';
			$d_output .= '<label class="custom-control custom-checkbox">';
			$d_output .= '<input type="checkbox" class="custom-control-input" id="'.$value2.'" name="'.$value2.'" '.$check_defaults[$value2].'>';
			$d_output .= '<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>';
			$d_output .= '</label>';
			$d_output .= '</div>';
			$d_output .= '</div>';
		}
		
		$d_output .= '</div>';
				
		$i++;
		
		if($i == 2) 
			$d_output .= '<div class="col-12 hidden-sm-down content--divider"></div>';
				
	}
	
	$d_output .= '</div>';
	$d_output .= '</div>';
	$d_output .= '<div class="card-block sectionCard--footer text-center">';
	$d_output .= '<button type="submit" class="btn btn--sectionFooter btn--bg" value="Mettre à jour">Mettre à jour</button>';
	$d_output .= '</div>';
	$d_output .= '</form>';

	$p->assign('header', $pLang['pdHeader']);
	$p->assign('update', $pLang['update']);
	$p->assign('output', $d_output);
	$p->display(RAIDER_TEMPLATE_PATH.'permissions_details.tpl');
} else if($task == 'add') {
// delete all old values
	$sql["DELETE"] = "permissions";
	$sql["WHERE"] = "group_id = {$id}";
	$db_raid->set_query('delete', $sql, __FILE__, __LINE__);

	foreach($_POST as $key => $value) {
		if($value == 'on') 	{
			$sql["INSERT"] = "permissions";
			$sql["VALUES"] = array(
								'permission_name'=>$key,
								'group_id'=>$id,
								'permission_value'=>1
							);
			$db_raid->set_query('insert', $sql, __FILE__, __LINE__);
		}
	}

	pRedirect('index.php?option='.$option);
} else {
	printError($pLang['invalidOption']);
}
?>