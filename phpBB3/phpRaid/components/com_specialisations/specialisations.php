<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// verify permissions
if(!$pMain->checkPerm('edit_definitions')) {
	pRedirect('index.php?option=com_login&task=login');
}

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(empty($task) || $task == '') {
	// setup the output
	$classes = array();
	$races = array();
	$definitions = array();
	$spes = array();
	
	unset($sql);
	$sql['SELECT'] = 'c.*,s.*';
	$sql['FROM'] = array('class c','spe s');
	$sql['WHERE'] = 'c.class_id = s.class_id';
	$sql['SORT'] = 'c.class_name';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($data = $db_raid->fetch()) {
		// admin options
		$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option='.$option.'&amp;task=edit&amp;id='.$data['spe_id'].'"><i class="material-icons md-12">edit</i></a> ';

		// setup array for data output
		array_push($spes,
			array(
				'class' => '<font color="'.$data['class_color'].'">'.$data['class_name'].'</font>',
				'spe' => '<font color="'.$data['class_color'].'">'.$data['spe_name'].'</font>',
				'edit'=>$admin,
				'checkbox'=>'<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['spe_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>'
			)
		);
	}

	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&mode=view&Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink(ALLOW_HOVER_INDEX, '', array());
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option);

	// setup column headers
	$report->addOutputColumn('class', $pLang['class'],'text-center','text-left', 'null', 'null');
	$report->addOutputColumn('spe', $pLang['spe'],'text-center','text-left', 'null', 'null');
	$report->addOutputColumn('edit','<i class="material-icons md-16">edit</i>','text-center','text-center','null','null');
	$report->addOutputColumn('checkbox', '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>','text-center','text-center', 'null', 'null');

	// put data into variable for output
	$spes = $report->getListFromArray($spes);

	$p->assign(
		array(
			// headers
			'spes_header' => $pLang['deSpe_header'],
			'upload_new' => $pLang['deUpload_new'],

			// other
			'create_new' => $pLang['create_new'],
			'upload' => $pLang['upload'],

			// data
			'spes' => $spes
		)
	);

	$p->display(RAIDER_TEMPLATE_PATH.'specialisations.tpl');
} else if($task == 'new' || $task == 'edit') {
	// no caching for this
	$p->caching = false;

	// localizations
	$p->assign(
		array(
			// error
			'speNameError' => $pLang['deSpeName_error'],
			'colorError' => $pLang['deColor_error'],

			// text
			'speHeader' => $pLang['deSpe_header'],
			'speNameText' => $pLang['deSpeName_text'],
			'colorText' => $pLang['deColor_text'],
			'restrictionsText' => $pLang['deRestrictions_text'],

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

	// set up restriction lists
	unset($sql);

	$sql['SELECT'] = '*';
	$sql['FROM'] = 'class';

	// setup defaults
	if($task == 'new') {
		if(isset($_POST['restrictions'])) {
			foreach($_POST['restrictions'] as $key => $value) {
				$selected[$value] = 1;
			}
		}
	} else {
		
		$sql2['SELECT'] = 'class_id as id';
		$sql2['FROM'] = 'spe';
		$sql2['WHERE'] ='spe_id='.intval($id);
		
		$result = $db_raid->set_query('select', $sql2, __FILE__, __LINE__);

		while($data = $db_raid->sql_fetchrow($result)) {
			$selected[$data['id']] = 1;
		}
	}

	// clear restrictions
	$rest_option = '';

	$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($data = $db_raid->sql_fetchrow($result)) {
		if($task == 'new') {
			$rest_option .= '<option value="'.$data['class_id'].'">'.$data['class_name'].'</option>';
		} else {
			if (isset($selected[$data['class_id']])) {
				$rest_option .= '<option selected value="'.$data['class_id'].'">'.$data['class_name'].'</option>';
			}
		}
	}

	// assign restrictions to template
	$p->assign('rest_option', $rest_option);

	if(empty($_POST)) {
		// new form, we (re)set the session data
		SmartyValidate::connect($p, true);

		// assign old values if it's an edit
		if($task == 'edit') {
			unset($sql);
			$sql['SELECT'] = '*';
			$sql['FROM'] = 'spe';
			$sql['WHERE'] = 'spe_id='.intval($id);
			$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
			$old_data = $db_raid->sql_fetchrow($result);
			$p->assign('name', $old_data['spe_name']);
		}

		// register our validators
		SmartyValidate::register_validator('name', 'name', 'notEmpty', false, false, 'trim');

		// display form
		$p->display(RAIDER_TEMPLATE_PATH.'specialisations_form.tpl');
	} else {
		// validate after a POST
		SmartyValidate::connect($p);

		if(SmartyValidate::is_valid($_POST)) {
			// updating information so clear cache
			$p->clear_cache(RAIDER_TEMPLATE_PATH.'specialisations.tpl');

			// no errors, done with SmartyValidate
			SmartyValidate::disconnect();

			// update/insert into database
			if($task == 'new') {
				foreach($_POST['restrictions'] as $value) {
					$class_id = $value;
				}
				
				unset($sql);
				$sql['INSERT'] = 'spe';
				$sql['VALUES'] = array(
									'class_id' => $value,
									'spe_name' => $_POST['name']
				);
				$db_raid->set_query('insert', $sql, __FILE__, __LINE__);
				$temp_id = $db_raid->sql_nextid($result);
			} else {
				unset($sql);
				$sql['UPDATE'] = 'spe';
				$sql['VALUES'] = array(
									'spe_name' => $_POST['name']
				);
				$sql['WHERE'] = 'spe_id='.intval($id);
				
				$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			}
			pRedirect('index.php?option='.$option);
		} else {
			// error, redraw the form
			$p->assign($_POST);

			$p->display(RAIDER_TEMPLATE_PATH.'specialisations_form.tpl');
		}
	}
} else if($task == 'delete') {
	for($i = 0; $i < count($_POST['select']); $i++) {
		unset($sql);
		$sql['DELETE'] = 'spe';
		$sql['WHERE'] = 'spe_id='.intval($_POST['select'][$i]);
		$db_raid->set_query('delete', $sql, __FILE__, __LINE__);
	}

	pRedirect('index.php?option='.$option);
} else {
	printError($pLang['invalidOption']);
}
?>