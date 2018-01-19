<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// report for output
include(RAIDER_CLASS_PATH.'report/report.php');
$report = &new ReportList;

if(empty($task) || $task == '') {
	// verify permissions
	if(!$pMain->checkPerm('edit_announcements_any') && !$pMain->checkPerm('edit_announcements_own')) {
		pRedirect('index.php?option=com_login&task=login');
	}

	// Manage sort for the SQL query
	if (empty($sort) || $sort == '' || $sort == 'date') {
		$sql_sort = 'announcement_timestamp';
	} else if($sort == 'username') {
		$sql_sort = 'username';
	} else {
		$sql_sort = 'announcement_'.$sort;
	}

	// Manage sort order for the SQL query
	if (empty($sortorder) || $sortorder == '' || $sortorder == 'desc') {
		$sql_sortorder = 'desc';
		$btn_sortorder = 'asc';
	} else {
		$sql_sortorder = 'asc';
		$btn_sortorder = 'desc';
	}

	// Manage first item for pagination
	if (empty($base) || $base == '') {
		$base = 0;
	} else {
		$base = $base;
	}

	// output announcements list
	$sql['SELECT'] = 'a.*, p.username, UNIX_TIMESTAMP(a.announcement_timestamp) AS time';
	$sql['FROM'] = 'announcements a';
	$sql['JOIN'] = array('TYPE'=>'LEFT','TABLE'=>'profile p','CONDITION'=>'a.profile_id = p.profile_id');
	$sql['WHERE'] = 'a.announcement_id > 0';
	//$sql['SORT'] = 'announcement_timestamp DESC';
	$sql['SORT'] = $sql_sort.' '.$sql_sortorder;
	if(!$pMain->checkPerm('edit_announcements_any')) {
		$sql['WHERE'] .= ' AND p.profile_id='.$pMain->getProfileID();
	}

	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	// array for data
	$phpr_a = array();

	while($data = $db_raid->fetch()) {
		// setup date and time
		$date = newDate($pConfig['date_format'],$data['time'],$pConfig['timezone'] + $pConfig['dst']);
		$time = newDate($pConfig['time_format'],$data['time'],$pConfig['timezone'] + $pConfig['dst']);

		// strip message down to basics
		$message = formatText($data['announcement_msg'],'_NOHTML_',25);
		$message = $data['announcement_msg'];

		// admin options
		$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option='.$option.'&amp;task=edit&amp;id='.$data['announcement_id'].'"><i class="material-icons md-12">edit</i></a>';

		// setup array for data output
		array_push($phpr_a,
			array(
				'title'=>$data['announcement_title'],
				'msg'=>$message,
				'date'=>$date,
				'time'=>$time,
				'by'=>$data['username'],
				'edit'=>$admin,
				'id'=>$data['announcement_id'],
				'checkbox'=>'<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['announcement_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>'
			)
		);
	}
	
	// CUSTOM DISPLAY - BEGIN
	// !!!!!!!!!!!!!!!!!! Gerer le cas ou il n'y pas de données

	$caption = getCollectionCaption($phpr_a,$base);
	$pagination = getCollectionPagination($phpr_a,$base,'index.php?option='.$option.'&amp;sortorder='.$sortorder.'&amp;sort='.$sort);

	$list_sort = array("title","date","username");
	$btn_sort = getCollectionSort($list_sort,'index.php?option='.$option.'&amp;sortorder='.$btn_sortorder);

	$listphpr_a =  getCollectionList($phpr_a,$base);

	foreach($listphpr_a as $list_announce) {
		$col_announce .= '<div class="collection-item">';
		$col_announce .= '<div class="title">'.$list_announce['title'].'</div>';
		$col_announce .= '<div class="attributeList">';
		$col_announce .= '<div class="attribute"><span class="attributeName">By : </span>'.$list_announce['by'].'</div>';
		$col_announce .= '<div class="attribute right"><span class="attributeName">Date : </span>'.$list_announce['date'].'</div>';
		$col_announce .= '</div>';
		$col_announce .= '<div class="list truncate">'.$list_announce['msg'].'</div>';		
		//$col_announce .= '<div class="list right-align author">'.$list_announce['by'].' -- '.$list_announce['date'].'</div>';
		$col_announce .= '<div class="secondary-content">';
		$col_announce .= '<input type="checkbox" class="filled-in" id="'.$list_announce['id'].'" name="select[]" value="'.$list_announce['id'].'" />';
		$col_announce .= '<label for="'.$list_announce['id'].'"></label>';
		$col_announce .= '</div>';
		$col_announce .= '</div>';
	}

	//$sort_announce = '<ul id="sort" class="dropdown-content">';
	//$sort_announce .= '<li><a href="index.php?option=com_announcements&amp;sort=title&amp;sortorder='.$sortorder_btn.'"> Sort by Title</a></li>';
	//$sort_announce .= '<li><a href="index.php?option=com_announcements&amp;sort=date&amp;sortorder='.$sortorder_btn.'"> Sort by Date</a></li>';
	//$sort_announce .= '<li><a href="index.php?option=com_announcements&amp;sort=username&amp;sortorder='.$sortorder_btn.'"> Sort by Author</a></li>';
	//$sort_announce .= '</ul>';

	$p->assign('caption',$caption);
	$p->assign('pagination',$pagination);
	$p->assign('aHeader',$pLang['aHeader']);
	$p->assign('btnSort',$btn_sort);
	$p->assign('colAnnounce',$col_announce);
	
	// CUSTOM DISPLAY - END

	// report setup
	setupOutput();

	// paging and sorting
	$report->showRecordCount(true);
	$report->allowPaging(true,$_SERVER['PHP_SELF'].'?option='.$option.'&amp;Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink('ALLOW_HOVER_INDEX','',array());
	$report->allowSort(true,$_GET['Sort'],$_GET['SortDescending'],'index.php?option='.$option);
	
	// setup column headers
	$report->addOutputColumn('title',$pLang['title'],'text-center','text-left','null','null');
	$report->addOutputColumn('msg',$pLang['message'],'text-center hidden-sm-down','text-left hidden-sm-down','null','null');
	$report->addOutputColumn('date',$pLang['date'],'text-center','text-center','null','null');
	$report->addOutputColumn('time',$pLang['time'],'text-center hidden-sm-down','text-center hidden-sm-down','null','null');
	$report->addOutputColumn('by',$pLang['posted_by'],'text-center','text-left','null','null');
	$report->addOutputColumn('edit','<i class="material-icons md-16">edit</i>','text-center','text-center','null','null');
	$report->addOutputColumn('checkbox','<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>','text-center','text-center','null','null');
	
	//href="index.php?option=com_announcements&amp;task=edit&amp;id=32">

	// put data into variable for output
	$output = $report->getListFromArray($phpr_a);

	$p->assign('header',$pLang['aHeader']);
	$p->assign('output',$output);
	$p->display(RAIDER_TEMPLATE_PATH.'announcements.tpl');
} else if($task == 'new' || $task == 'edit') {
	// no caching for this
	$p->caching = false;

	// verify permissions
	if($task == 'new') {
		if(!$pMain->checkPerm('edit_announcements_any') && !$pMain->checkPerm('edit_announcements_own')) {
			pRedirect('index.php?option=com_login&task=login');
		}
	} else {
		if(!$pMain->checkPerm('edit_announcements_any')) {
			if(!$pMain->checkPerm('edit_announcements_own') || $pMain->getProfileID() != getProfileFromTable('announcements','announcement_id',$id)) {
				pRedirect('index.php?option=com_login&task=login');
			}
		}
	}


	// localizations
	$p->assign(
		array(
			'header' => $pLang['aCreate_header'],

			// errors
			'classError' => 'invalid',
			'propError' => 'aria-invalid="true"',
			'messageError' => $pLang['aMessage_error'],
			'titleError' => $pLang['aTitle_error'],

			// text
			'messageText' => $pLang['aMessage_text'],
			'titleText' => $pLang['aTitle_text'],

			// buttons
			'reset' => $pLang['reset'],
			'submit' => $pLang['submit']
		)
	);

	// assign task
	if($task == 'edit')
		$p->assign('task',$task.'&id='.$id);
	else
		$p->assign('task',$task);

	if(empty($_POST)) {
		// new form,we (re)set the session data
		SmartyValidate::connect($p,true);

		// assign old values if it's an edit
		if($task == 'edit') {
			$sql['SELECT'] = '*';
			$sql['FROM'] = 'announcements';
			$sql['WHERE'] = 'announcement_id='.$id;
			$db_raid->set_query('select', $sql, __FILE__, __LINE__);
			$p->assign($db_raid->fetch());
		}

		// register our validators
		SmartyValidate::register_validator('title','announcement_title','notEmpty',false,false,'trim');
		SmartyValidate::register_validator('message','announcement_msg','notEmpty',false,false,'trim');

		// display form
		$p->display(RAIDER_TEMPLATE_PATH.'announcements_form.tpl');
	} else {
		// validate after a POST
		SmartyValidate::connect($p);

		if(SmartyValidate::is_valid($_POST)) {
			// updating information so clear cache
			$p->clear_cache(RAIDER_TEMPLATE_PATH.'announcements.tpl');

			// no errors,done with SmartyValidate
			SmartyValidate::disconnect();

			// update/insert into database
			$sql['VALUES'] = array(
				'announcement_title'=>$_POST['announcement_title'],
				'announcement_msg'=>$_POST['announcement_msg']
			);
			if($task == 'new') {
				// setup variables not submitted by form
				$sql['VALUES']['profile_id'] = $pMain->getProfileID();
				$sql['INSERT'] = 'announcements';
				$db_raid->set_query('insert', $sql, __FILE__, __LINE__);
			} else {
				$sql['UPDATE'] = 'announcements';
				$sql['WHERE'] = 'announcement_id='.$id;
				$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			}
			pRedirect('index.php?option='.$option);
		} else {
			// error,redraw the form
			$p->assign($_POST);
			$p->display(RAIDER_TEMPLATE_PATH.'announcements_form.tpl');
		}
	}
} else if($task == 'delete') {
// verify permissions
	for($i = 0; $i < count($_POST['select']); $i++) {
		if($pMain->checkPerm('edit_announcements_any') || ($pMain->checkPerm('edit_announcements_own') && $pMain->getProfileID() == getProfileFromTable('announcements','announcement_id',intval($_POST['select'][$i])))) {
			$sql['DELETE'] = 'announcements';
			$sql['WHERE'] = 'announcement_id='.intval($_POST['select'][$i]);
			$db_raid->set_query('delete', $sql, __FILE__, __LINE__);
		}
	}
	pRedirect('index.php?option='.$option);
} else {
	printError($pLang['invalidOption']);
}
?>