<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// verify permissions
if(!$pMain->checkPerm('edit_groups')) {
	pRedirect('index.php?option=com_login&task=login');
}

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(empty($task) || $task == '') {
	// output announcements list
	$sql['SELECT'] = 'g.group_id, g.group_name,	COUNT(p.profile_id) AS count';
	$sql['FROM'] = 'groups g';
	$sql['JOIN'] = array(
						array('TYPE'=>'LEFT','TABLE'=>'profile p','CONDITION'=>'g.group_id=p.group_id')
	);
	$sql['GROUPBY'] = 'g.group_id';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	// array for data
	$phpr_a = array();

	while($data = $db_raid->fetch()) {
		// admin options
		$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option='.$option.'&task=edit&id='.$data['group_id'].'"><i class="material-icons md-12">edit</i></a> ';

		// setup array for data output
		array_push($phpr_a,
			array(
				'name'=>$data['group_name'],
				'members'=>'<a href="index.php?option='.$option.'&task=details&id='.$data['group_id'].'"><strong>'.$data['count'].'</strong></a>',
				'edit'=>$admin,
				'checkbox'=>'<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['group_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>'
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
	$report->addOutputColumn('edit','<i class="material-icons md-16">edit</i>','text-center','text-center','null','null');
	$report->addOutputColumn('checkbox', '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>','text-center','text-center', 'null', 'null');

	// put data into variable for output
	$output = $report->getListFromArray($phpr_a);

	$p->assign('create_new', $pLang['create_new']);
	$p->assign('header', $pLang['grHeader']);
	$p->assign('output', $output);
	$p->display(RAIDER_TEMPLATE_PATH.'groups.tpl');
} else if($task == 'new' || $task == 'edit') {
	// no caching for this
	$p->caching = false;

	// localizations
	$p->assign(
		array(
			// errors
			'nameError' => $pLang['grName_error'],

			// text
			'header' => $pLang['grCreate_header'],
			'nameText' => $pLang['grName_text'],

			// buttons
			'reset' => $pLang['reset'],
			'submit' => $pLang['submit']
		)
	);

	// assign task
	if($task == 'edit')
		$p->assign('task', $task.'&id='.$id);
	else
		$p->assign('task' , $task);

	if(empty($_POST)) {
		// new form, we (re)set the session data
		SmartyValidate::connect($p, true);

		// assign old values if it's an edit
		if($task == 'edit') {
			$sql['SELECT'] = '*';
			$sql['FROM'] = 'groups';
			$sql['WHERE'] = 'group_id='.$id;
			$db_raid->set_query('select', $sql, __FILE__, __LINE__);
			$p->assign($db_raid->fetch());
		}

		// register our validators
		SmartyValidate::register_validator('name', 'group_name', 'notEmpty', false, false, 'trim');

		// display form
		$p->display(RAIDER_TEMPLATE_PATH.'groups_form.tpl');
	} else {
		// validate after a POST
		SmartyValidate::connect($p);

		if(SmartyValidate::is_valid($_POST)) {
			// updating information so clear cache
			$p->clear_cache(RAIDER_TEMPLATE_PATH.'groups.tpl');

			// no errors, done with SmartyValidate
			SmartyValidate::disconnect();

			// update/insert into database
			$sql['VALUES']=array('group_name'=>$_POST['group_name']);
			if($task == 'new') {
				// setup variables not submitted by form
				$sql['INSERT'] = 'groups';
				$db_raid->set_query('insert', $sql, __FILE__, __LINE__);
			} else {
				$sql['UPDATE'] = 'groups';
				$sql['WHERE'] = 'group_id='.$id;
				$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			}
			pRedirect('index.php?option='.$option);
		} else {
			// error, redraw the form
			$p->assign($_POST);
			$p->display(RAIDER_TEMPLATE_PATH.'groups_form.tpl');
		}
	}
} else if($task == 'delete') {
	// verify permissions
	for($i = 0; $i < count($_POST['select']); $i++) {
		$sql['DELETE'] = 'groups';
		$sql['WHERE'] = 'group_id='.intval($_POST['select'][$i]);
		$db_raid->set_query('delete', $sql, __FILE__, __LINE__);

		// delete permission set
		$sql['DELETE'] = 'permissions';
		$sql['WHERE'] = 'group_id='.intval($_POST['select'][$i]);
		$db_raid->set_query('delete', $sql, __FILE__, __LINE__);
	}

	pRedirect('index.php?option='.$option);
} else if($task == 'details' || $task == 'search' || $task == 'error') {
	// array for data
	$phpr_d = array();

	$sql['SELECT'] = '*';
	$sql['FROM'] = 'profile';
	$sql['WHERE'] = 'group_id='.$id;
	$sql['SORT'] = 'username';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($data = $db_raid->fetch())
	{
		// setup array for data output
		array_push($phpr_d,
			array(
				'g_username'=>'<a href="index.php?option=com_users&id='.$data['profile_id'].'">'.$data['username'].'</a>',
				'g_email'=>$data['user_email'],
				'g_joindate'=>newDate($pConfig['date_format'], $data['join_date'], $pConfig['timezone'] + $pConfig['dst']).', '.newDate($pConfig['time_format'], $data['join_date'], $pConfig['timezone'] + $pConfig['dst']),
				'g_checkbox'=>'<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['profile_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>'
			)
		);
	}

	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&amp;task=details&id='.$_GET['id'].'&amp;Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink(ALLOW_HOVER_INDEX, '', array());
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option.'&task=details&id='.$id);

	// setup column headers
	$report->addOutputColumn('g_username', $pLang['username'],'text-center','text-left', 'null','null');
	$report->addOutputColumn('g_email', $pLang['email'],'text-center hidden-sm-down','text-left hidden-sm-down','null', 'null');
	$report->addOutputColumn('g_joindate', $pLang['join_date'],'text-center','text-center', 'null', 'null');
	$report->addOutputColumn('g_checkbox', '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>','text-center','text-center', 'null', 'null');
						
	$remove_button ='<button type="submit" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete" onClick="return display_confirm(\''.$pLang['confirm_delete'].'\')"><i class="material-icons md-14">delete</i></button>';

	$user_find .= '<input type="text" class="form-control inputCard inputCard-border col-8" id="username" placeholder="username" name="username">';
	$user_find .= '<button class="btn btn--input btn--bg" type="submit" name="submituser"><i class="material-icons md-14">person_add</i></button>';
	if ($task == 'error') {
		$usernotfound = $pLang['userNotFound'];
		$user_find .= '<div class="form-control-feedback text-danger ml-1 mt-1">'.$usernotfound.'</div>';
	}
	
	// put data into variable for output
	$d_output = $report->getListFromArray($phpr_d);

	// parse output
	$p->assign(
		array(
			'gdHeader'=>$pLang['gdHeader'],
			'gdData'=>$d_output,
			'gdFind'=>$user_find,
			'remove_button' => $remove_button,
			'group_id'=>$id
		)
	);
   
    if($task == 'search') {

	// check the database for matches
	$search_username = str_replace('*', '%', $_POST['search_username']);
	$sql['SELECT'] = '*';
	$sql['FROM'] = 'profile';
	$sql['WHERE'] = 'username LIKE '.$db_raid->quote_smart($search_username);
	$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

	$options = '';
	if($db_raid->sql_numrows($result) == 0) {
		$options = '<option value="">'.$pLang['no_matches'].'</option>';
	} else {
		while($data = $db_raid->sql_fetchrow($result)) {
			$options .= '<option value="'.$data['username'].'">'.$data['username'].'</option>';
		}
	}

	// asign variables
	$p->assign('user_options', $options);
	}
			
	$p->display(RAIDER_TEMPLATE_PATH.'groups_details.tpl');
	
} else if($task == 'add') {
	$profile_id = getProfileID($_POST['username']);

	if(empty($profile_id)) {
		pRedirect("index.php?option=".$option."&task=error&id=".$id);
	}

	$sql['UPDATE'] = 'profile';
	$sql['VALUES'] = array('group_id'=>$id);
	$sql['WHERE'] = 'profile_id='.$profile_id;
	$db_raid->set_query('update', $sql, __FILE__, __LINE__);

	pRedirect("index.php?option=".$option."&task=details&id=".$id);
} else if($task == 'addsearch') {
	$profile_id = getProfileID($_POST['username_list']);

	if(empty($profile_id)) {
		pRedirect("index.php?option=".$option."&task=details&id=".$id."&error=USER_NOT_FOUND");
	}

	$sql['UPDATE'] = 'profile';
	$sql['VALUES'] = array('group_id'=>$id);
	$sql['WHERE'] = 'profile_id='.$profile_id;
	$db_raid->set_query('update', $sql, __FILE__, __LINE__);

	pRedirect("index.php?option=".$option."&task=details&id=".$id);
} else if($task == 'delete_user') {
	for($i = 0; $i < count($_POST['select']); $i++) {
		$sql['UPDATE'] = 'profile';
		$sql['VALUES'] = array('group_id'=>0);
		$sql['WHERE'] = 'profile_id='.intval($_POST['select'][$i]);
		$db_raid->set_query('update', $sql, __FILE__, __LINE__);
	}

	pRedirect('index.php?option='.$option.'&task=details&id='.$id);
} else {
	printError($pLang['invalidOption']);
}
?>