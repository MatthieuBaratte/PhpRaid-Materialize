<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(!$pMain->checkPerm('view_roster')) {
	pRedirect('index.php?option=com_login&task=login');
}

if(empty($task) || $task == '') {
	$char_data = getCharacterData($pMain);

	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&amp;Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink('', '', '');
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option);

	// setup column headers
	$report->addOutputColumn('name', $pLang['name'],'text-center','text-left', null, null, null,'__NOLINK__');
	$report->addOutputColumn('race', $pLang['race'],'text-center hidden-sm-down','text-center hidden-sm-down', null, null, null, '__NOLINK__');
	$report->addOutputColumn('class', $pLang['class'],'text-center','text-center', null, null, null,'__NOLINK__');
	$report->addOutputColumn('level', $pLang['level'],'text-center','text-center', null, null, null,'__NOLINK__');
	$report->addOutputColumn('guild', $pLang['guild'],'text-center hidden-sm-down','text-center hidden-sm-down', null, null, null, '__NOLINK__');
	$report->addOutputColumn('spe1_name', $pLang['chSpe1Light_text'],'text-center hidden-sm-down','text-center hidden-sm-down', 'null', 'null');
	$report->addOutputColumn('spe2_name', $pLang['chSpe2Light_text'],'text-center hidden-sm-down','text-center hidden-sm-down', 'null', 'null');

	// setup attribute columns
	$sql["SELECT"] = "att_name, att_icon, att_show";
	$sql["FROM"] = "attribute";
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($data = $db_raid->fetch()) {
		if($data['att_show']) {
			$icon = '<img class="img--attribute" src="games/'.$pConfig['game'].'/images/attributes/'.$data['att_icon'].'" alt="'.$data['att_name'].'">';
			$report->addOutputColumn($data['att_name'], $data['att_name'], 'text-center hidden-sm-down', 'text-center hidden-sm-down', 'null', null);
		}
	}

	if($pMain->checkPerm('edit_characters_own') || $pMain->checkPerm('edit_characters_any'))
		$report->addOutputColumn('checkbox','<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>', 'text-center', 'text-center', 'null', null);
	
	// put data into variable for output
	$output = $report->getListFromArray($char_data);

	if($pMain->checkPerm('edit_characters_own') || $pMain->checkPerm('edit_characters_any')) {
		$admin = '<button type="input" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete"><i class="material-icons md-14">delete</i></button>';
		
	} else {
		$admin = '&nbsp;';
	}
		
	$p->assign('header', $pLang['roHeader']);
	$p->assign('output', $output);
	$p->assign('admin', $admin);
	$p->display(RAIDER_TEMPLATE_PATH.'roster.tpl');
} else if($task == 'delete') {
	for($i = 0; $i < count($_POST['select']); $i++) {
		// verify permissions
		if($pMain->checkPerm('edit_characters_any') || ($pMain->checkPerm('edit_characters_own') && checkOwn('character', intval($_POST['select'][$i]), $pMain->getProfileID()))) {
			$sql['DELETE'] = 'character';
			$sql['WHERE'] = 'character_id='.intval($_POST['select'][$i]);
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);

			$sql['DELETE'] = 'subclass';
			$sql['WHERE'] = 'character_id='.intval($_POST['select'][$i]);
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);

			$sql['DELETE'] = 'signups';
			$sql['WHERE'] = 'character_id='.intval($_POST['select'][$i]);
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);
		}
	}

	pRedirect('index.php?option='.$option);
} else {
	echo "Invalid option specified";
	exit;
}
?>