<?php
// javascript information
$document_ready = array();
$scripts = '';
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/includes/scripts/phpraider/phpraider.min.js" language="javascript"></script>'."\n";
$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/includes/scripts/phpraider/phpraider.js" language="javascript"></script>'."\n";

$p->assign(
	array(
		'javascript'=>$scripts,
		'tooltip'=>$tooltip,
		'confirm_delete'=>$pLang['confirm_delete']
	)
);
if (!empty($id)) {
	$p->assign ('id' , $id);
}

// setup login information
if($pMain->getLogged()) {
	$user_info = sprintf($pLang['userLogged'], $pMain->getUser(), 'index.php?option=com_login&amp;task=logout');
} else {
	$user_info = sprintf($pLang['userNotLogged'], 'index.php?option=com_login&amp;task=login', $pConfig_auth['register_url']);
	$user_info .= '<br><a href="index.php?option=com_password">'.$pLang['lostPassword'].'</a>';
}

$p->assign('user_info', $user_info);

// setup some generic template variables
$p->assign(
	array(
		'absolute_path' => RAIDER_BASE_PATH,
		'site_url' => $pConfig['site_url'],
		'template' => $pConfig['template']
	)
);

// output header template
$p->display(RAIDER_TEMPLATE_PATH.'header.tpl');
?>