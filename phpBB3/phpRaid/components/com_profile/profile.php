<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

if(empty($task) || $task == '') {
	// verify user is logged in
	if(!$pMain->getLogged()) {
		pRedirect('index.php?option=com_login');
	}

	// no caching for this
	$p->caching = false;

	// localizations
	$p->assign(
		array(
			'header' => $pLang['paCreate_header'],

			// errors
			'emailError' => '',
			'newPasswordTextError' => '',
			'confirmPasswordError' => '',
			'enterPasswordError' => '',

			// text
			'emailText' => $pLang['paEmail_text'],
			'enterPasswordText' => $pLang['paEnterPassword_text'],
			'newPasswordText' => $pLang['paNewPassword_text'],
			'confirmPasswordText' => $pLang['paConfirmPassword_text'],

			// buttons
			'reset' => $pLang['reset'],
			'submit' => $pLang['submit'],
			
			// Avatar
			'avatarText' => $pLang['paAvatar_text']
		)
	);
	
	// ----------
	// Build Avatar list
	// ----------
	unset($sql);
	$sql["SELECT"] = "*";
	$sql["FROM"] = "profile";
	$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$old_avatar = $db_raid->fetch();
	// Save old avatar
	$avatarOld = $old_avatar['icon_avatar'];
	// Get all avatar img from games/<game name>/images/avatars/ directory
	if($dh = opendir(RAIDER_GAME_PATH."images".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR)) {
		while(false != ($filename = readdir($dh))) {
			$files[] = $filename;
		}
		closedir($dh);
		sort($files);
		array_shift($files);
		array_shift($files);
	}
	// Build options list for select input
	if (is_array($files)) {
		$avatars = '';
		foreach($files as $value) {
			if($value == $avatarOld)
				$selected = ' selected';
			else
				$selected = '';
				$avatars .= '<option value="'.$value.'"'.$selected.' data-icon="games/'.$pConfig['game'].'/images/avatars/'.$value.'" class="circle">'.str_replace(strchr($value, '.'), "", $value).'</option>';
		}
		$p->assign('avatars', $avatars);
		unset($files);		
	} else {
		printError($pLang['avatarError']);
	}
	
	// Check authentification type	
	if ($pConfig['authentication'] == 'phpbb3') {
		$p->assign('authentype', 'phpbb3');
		$p->assign('authenttitle', $pLang['authentphpBB3title']);
		$p->assign('authentdesc', $pLang['authentphpBB3desc'] );
	}
	
	if(empty($_POST)) {
		// new form, we (re)set the session data
		SmartyValidate::connect($p, true);

		// assign old values if it's an edit
		$sql["SELECT"] = "*";
		$sql["FROM"] = "profile";
		$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
		$db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$p->assign($db_raid->fetch());

		// register our validators
		SmartyValidate::register_validator('email', 'user_email', 'isEmail', false, false, 'trim');
		
		// display form
		$p->display(RAIDER_TEMPLATE_PATH.'profile.tpl');
	} else {
		// validate after a POST
		SmartyValidate::connect($p);

		// only works with phpRaider authentication
		if($pConfig['authentication'] == 'phpraider') {
			// do a few custom checks
			$form_error = 0;

			// verify password entered matches db
			$sql["SELECT"] = "password";
			$sql["FROM"] = "profile";
			$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
			$db_raid->set_query('select', $sql, __FILE__, __LINE__);
			$data = $db_raid->fetch();

			if((md5($_POST['enter_password']) != $data['password'])) {
				$form_error = 1;
				$p->assign('enterPasswordError', $pLang['paEnterPassword_error']);
				// manage validate with materialized css
				$p->assign('materializedClassErrorEnter',$pLang['cssErrorClass']);
				$p->assign('materializedPropErrorEnter', $pLang['cssErrorProp']);
			}

			// make sure (new) passwords match
			if($form_error == 0 && !empty($_POST['new_password'])) {
				if($_POST['new_password'] != $_POST['confirm_password']) {
					$form_error = 1;
					$p->assign('confirmPasswordError', $pLang['paConfirmPassword_error']);
					// manage validate with materialized css
					$p->assign('materializedClassErrorConfirm',$pLang['cssErrorClass']);
					$p->assign('materializedPropErrorConfirm', $pLang['cssErrorProp']);
				}
			}
		}
		
		if(SmartyValidate::is_valid($_POST) && $form_error == 0) {
			// updating information so clear cache
			$p->clear_cache(RAIDER_TEMPLATE_PATH.'profile.tpl');
			
			// no errors, done with SmartyValidate
			SmartyValidate::disconnect();

			// update database
			$sql["UPDATE"] = "profile";
			$sql["VALUES"] = array('user_email' => $_POST['user_email']);
			$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
			$db_raid->set_query('update', $sql, __FILE__, __LINE__);

			if(!empty($_POST['new_password']) && ($pConfig['authentication'] != 'phpbb3')) {
				$sql["UPDATE"] = "profile";
				$sql["VALUES"] = array('password' => md5($_POST['new_password']));
				$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
				$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			}
			
			pRedirect('index.php?option='.$option);
		} else {
			// error, redraw the form			
			$p->assign($_POST);
			$p->display(RAIDER_TEMPLATE_PATH.'profile.tpl');
		}	
	}
} else if($task == 'load_icon') {
		
			// update database
			unset($sql);
			$sql["UPDATE"] = "profile";
			$sql['VALUES']['icon_avatar'] = $_POST['icon_name'];
			$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
			$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			
			pRedirect('index.php?option='.$option);
} else {
	printError($pLang['invalidOption']);
}
?>