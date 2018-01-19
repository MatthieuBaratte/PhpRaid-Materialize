<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// verify permissions
if(!$pMain->checkPerm('edit_characters_own') && !$pMain->checkPerm('edit_characters_any')) {
	pRedirect('index.php?option=com_login&task=login');
}

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(empty($task) || $task == '') {
	$char_data = getCharacterData($pMain, $id);

	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&amp;Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink(ALLOW_HOVER_INDEX, '', array());
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option);

	// setup column headers
	$report->addOutputColumn('name', $pLang['name'], 'text-center', 'text-left', 'null', 'null');
	$report->addOutputColumn('race', $pLang['race'], 'text-center hidden-sm-down', 'text-center hidden-sm-down', 'null', 'null');
	$report->addOutputColumn('class', $pLang['class'], 'text-center', 'text-center', 'null', 'null');
	$report->addOutputColumn('level', $pLang['level'], 'text-center', 'text-center', 'null', 'null');
	$report->addOutputColumn('guild', $pLang['guild'], 'text-center hidden-sm-down', 'text-center hidden-sm-down', 'null', 'null');

	// setup attribute columns
	$sql["SELECT"] = "att_name, att_icon, att_show";
	$sql["FROM"] = "attribute";
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($data = $db_raid->fetch()) {
		if($data['att_show']) {
			$icon = '<img class="img--attribute" src="games/'.$pConfig['game'].'/images/attributes/'.$data['att_icon'].'">';
			$report->addOutputColumn($data['att_name'], $data['att_name'], 'text-center hidden-sm-down', 'text-center hidden-sm-down', 'null', 'null');
		}
	}
	$report->addOutputColumn('edit','<i class="material-icons md-16">edit</i>','text-center','text-center','null','null');
	$report->addOutputColumn('checkbox', '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>', 'text-center', 'text-center', 'null', 'null');

	// put data into variable for output
	$output = $report->getListFromArray($char_data);

	$p->assign('header', $pLang['chHeader']);
	$p->assign('output', $output);
	$p->display(RAIDER_TEMPLATE_PATH.'characters.tpl');
} else {
	printError($pLang['invalidOption']);
}
?>