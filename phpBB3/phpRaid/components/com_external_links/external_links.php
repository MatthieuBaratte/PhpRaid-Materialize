<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

// verify permissions
if(!$pMain->checkPerm('edit_configuration')) {
	pRedirect('index.php?option=com_login&task=login');
}

// report for output
include(RAIDER_CLASS_PATH.'report'.DIRECTORY_SEPARATOR.'report.php');
$report = &new ReportList;

if(empty($task) || $task == '') {

	// setup the output
	$links = array();

	unset($sql);
	$sql['SELECT'] = '*';
	$sql['FROM'] = 'external_links';
	$sql['SORT'] = 'id';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	// Manage first item for pagination
	if (empty($base) || $base == '') {
		$base = 0;
	} else {
		$base = $base;
	}

	while($data = $db_raid->fetch()) {
		// admin options
		$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option='.$option.'&amp;task=edit&amp;id='.$data['id'].'"><i class="material-icons md-12">edit</i></a> ';

		// setup array for data output
		array_push($links,
			array(
				'id' => $data['id'],
				'title' => $data['title'],
				'icon' => '<i class="material-icons md-16">'.$data['icon_mdl'].'</i>',
				'url' => $data['url'],
				'edit'=>$admin,
				'checkbox'=>'<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>'
			)
		);
	}

	// CUSTOM DISPLAY - BEGIN
	// !!!!!!!!!!!!!!!!!! Gerer le cas ou il n'y pas de données

	$caption = getCollectionCaption($links,$base);
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
	$report->allowPaging(true, $_SERVER['PHP_SELF'].'?option='.$option.'&mode=view&Base=');
	$report->setListRange((empty($_GET['Base'])?'0':$_GET['Base']), $pConfig['report_max']);
	$report->allowLink(ALLOW_HOVER_INDEX, '', array());
	$report->allowSort(true, $_GET['Sort'], $_GET['SortDescending'], 'index.php?option='.$option);

	// setup column headers
	$report->addOutputColumn('id', $pLang['link_id'],'text-center','text-center', 'null', 'null');
	$report->addOutputColumn('title', $pLang['link_title'],'text-center','text-center', 'null', 'null');
	$report->addOutputColumn('icon', $pLang['link_icon'],'text-center','text-center', 'null', 'null');
	$report->addOutputColumn('url', $pLang['link_url'],'text-center','text-left', 'null', 'null');
	$report->addOutputColumn('edit','<i class="material-icons md-16">edit</i>','text-center','text-center','null','null');
	$report->addOutputColumn('checkbox', '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" onClick="invertAll(this,this.form);" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>','text-center','text-center', 'null', 'null');

	// put data into variable for output
	$links = $report->getListFromArray($links);

	$p->assign(
		array(
			// headers
			'links_header' => $pLang['link_header'],
			'upload_new' => $pLang['deUpload_new'],

			// other
			'create_new' => $pLang['create_new'],
			'upload' => $pLang['upload'],
			
			// data
			'links' => $links
		)
	);

	$p->display(RAIDER_TEMPLATE_PATH.'external_links.tpl');
} else if($task == 'new' || $task == 'edit') {
	// no caching for this
	$p->caching = false;

	// localizations
	$p->assign(
		array(
			// error
			'linktitleError' => $pLang['linktitleError'],
			'linkurlError' => $pLang['linkurlError'],

			// text
			'links_header' => $pLang['link_header_c'],
			'txt_title' => $pLang['link_title'],
			'txt_icon' => $pLang['link_icon'],
			'txt_url' => $pLang['link_url'],
			'txt_mdl' => $pLang['link_mdl'],

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
			unset($sql);
			$sql['SELECT'] = '*';
			$sql['FROM'] = 'external_links';
			$sql['WHERE'] = 'id='.intval($id);
			$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
			$old_data = $db_raid->sql_fetchrow($result);
			$p->assign('id', $old_data['id']);
			$p->assign('title', $old_data['title']);
			$p->assign('icon', $old_data['icon_mdl']);
			$p->assign('url', $old_data['url']);
		}

		// register our validators
		SmartyValidate::register_validator('title', 'title', 'notEmpty', false, false, 'trim');
		SmartyValidate::register_validator('url', 'url', 'notEmpty', false, false, 'trim');

		// display form
		$p->display(RAIDER_TEMPLATE_PATH.'external_links_form.tpl');
	} else {
		// validate after a POST
		SmartyValidate::connect($p);

		if(SmartyValidate::is_valid($_POST)) {
			// updating information so clear cache
			$p->clear_cache(RAIDER_TEMPLATE_PATH.'external_links.tpl');

			// no errors, done with SmartyValidate
			SmartyValidate::disconnect();

			// update/insert into database
			if($task == 'new') {
								
				unset($sql);
				$sql['INSERT'] = 'external_links';
				$sql['VALUES'] = array(
									'title' => $_POST['title'],
									'icon_mdl' => $_POST['icon'],
									'url' => $_POST['url']
				);
				$db_raid->set_query('insert', $sql, __FILE__, __LINE__);
				$temp_id = $db_raid->sql_nextid($result);
			} else {
				unset($sql);
				$sql['UPDATE'] = 'external_links';
				$sql['VALUES'] = array(
									'title' => $_POST['title'],
									'icon_mdl' => $_POST['icon'],
									'url' => $_POST['url']
				);
				$sql['WHERE'] = 'id='.intval($id);
				
				$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			}
			pRedirect('index.php?option='.$option);
		} else {
			// error, redraw the form
			$p->assign($_POST);
			
			
			$p->display(RAIDER_TEMPLATE_PATH.'external_links_form.tpl');
		}
	}
} else if($task == 'delete') {
	for($i = 0; $i < count($_POST['select']); $i++) {
		unset($sql);
		$sql['DELETE'] = 'external_links';
		$sql['WHERE'] = 'id='.intval($_POST['select'][$i]);
		$db_raid->set_query('delete', $sql, __FILE__, __LINE__);
	}

	pRedirect('index.php?option='.$option);
} else {
	printError($pLang['invalidOption']);
}
?>