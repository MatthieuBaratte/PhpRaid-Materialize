<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(!$pMain->checkPerm('view_members')) {
	pRedirect('index.php?option=com_login&task=login');
}

if(empty($task) || $task == '') {
	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&amp;Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink(ALLOW_HOVER_INDEX, '', array());
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option);

	// setup column headers
	$report->addOutputColumn('username', $pLang['username'], 'text-center', 'text-left', null, null, null, '__NOLINK__');
	$report->addOutputColumn('email', $pLang['email'], 'text-center hidden-sm-down', 'text-left hidden-sm-down', null, null, null, '__NOLINK__');
	$report->addOutputColumn('join_date', $pLang['join_date'], 'text-center', 'text-center', null, null, null, '__NOLINK__');
	$report->addOutputColumn('group', $pLang['group'], 'text-center', 'text-left', null, null, null, '__NOLINK__');
	$report->addOutputColumn('checkbox', '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>', 'text-center', 'text-center', null, null, null, '__NOLINK__');

	// get data from database
	$members = array();

	$sql['SELECT'] = 'p.*, g.group_name AS group_name';
	$sql['FROM'] = 'profile p';
	$sql['JOIN'] = array(
						array('TYPE'=>'LEFT','TABLE'=>'groups AS g','CONDITION'=>'p.group_id = g.group_id')
	);
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($data = $db_raid->fetch()) {
		// checkboxes
		if(($pMain->getProfileID() == $data['profile_id']) || $pMain->checkPerm('edit_characters_any')) {
			$checkbox = '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['profile_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>';
		} else {
			$checkbox = '';
		}

		array_push($members,
			array(
				'username' => $data['username'],
				'join_date' => newDate($pConfig['date_format'].' @ '.$pConfig['time_format'], $data['join_date'], $pConfig['timezone'] + $pConfig['dst']),
				'group' => $data['group_name'],
				'email' => $data['user_email'],
				'checkbox' => $checkbox
			)
		);
	}

	// put data into variable for output
	$output = $report->getListFromArray($members);

	if($pMain->checkPerm('edit_characters_own') || $pMain->checkPerm('edit_characters_any')) {
		$admin = '<button type="input" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete"><i class="material-icons md-14">delete</i></button>';
	} else {
		$admin = '&nbsp;';
	}

	$p->assign('header', $pLang['meHeader']);
	$p->assign('output', $output);
	$p->assign('admin', $admin);
	$p->display(RAIDER_TEMPLATE_PATH.'members.tpl');
} else if($task == 'delete') {
	// verify permissions
	if($pMain->checkPerm('delete_members')) {
		for($i = 0; $i < count($_POST['select']); $i++) {
			$isSelf = ($pMain->getProfileID() == intval($_POST['select'][$i]));

			// Remove all signedup chars from this profile
			$sql2['SELECT'] = 'c.character_id';
			$sql2['FROM'] = 'character c';
			$sql2['WHERE'] = 'c.profile_id='.intval($_POST['select'][$i]);
			$sql['DELETE'] = 'signups';
			$sql['WHERE'] = 'character_id IN ('.$db_raid->parse_query('select', $sql2).')';
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);

			// Remove the characters
			$sql['DELETE'] = 'character';
			$sql['WHERE'] = 'profile_id='.intval($_POST['select'][$i]);
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);

			// Last, remove the profile
			$sql['DELETE'] = 'profile';
			$sql['WHERE'] = 'profile_id='.intval($_POST['select'][$i]);
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);
		}
		if ($isSelf == true) {
			// Kill session when deleting own character.
			pLogout();
		}
	}

	pRedirect('index.php?option='.$option);
} else {
	echo "Invalid option specified";
}
?>