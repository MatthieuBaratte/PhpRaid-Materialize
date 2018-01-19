<?php
// sets up icons with appropriate tooltiprgba(255,255,255,0.1)
function setIcon($type, $name, $tooltip = '', $ajax = 0) {
	global $pConfig;
	
	// icon_edit.png

	if($tooltip != '') {
		if($ajax) {
			$tooltip = 'data-toggle="popover" data-placement="top" title="title" data-poload="'.$tooltip.'" ';
		} else {
			$tooltip = '';
		}
	}

	switch ($type) {
		case '_RAID_':
			$path = $pConfig['site_url'].'/games/'.$pConfig['game'].'/images/raids/'.$name;
			break;
		case '_TEMPLATE_':
			$path = $pConfig['site_url'].'/templates/'.$pConfig['template'].'/images/icons/'.$name;
			break;
	}

	return "<img src=\"$path\" $tooltip border=\"0\" alt=\"$name\">";
}

// returns an associative array with information for processing via report
// $old = 1, get raids that are expired.
// $profile > 0 - Get raids that are owned by $profile
// $signed = 1 - Get raids that $profile was signed for (available/queued/canceled).
function getRaidList($old = 0, $profile = 0, $signed = 0) {
	global $pLang, $db_raid, $pConfig, $pMain;

	$array = array();

	$sql['SELECT'] = 'r.*';
	if($signed) $sql['SELECT'] .= ', s.*';

	$sql['FROM'] = array('raid r');
	if($signed>0) array_push($sql['FROM'],'signups s','character c');

	$sql['WHERE'] = 'r.raid_id>0';
	$sql['WHERE'] .= ' AND r.expired='.(($old==1)?'1':'0');
	if($signed) {
		$sql['WHERE'] .= ' AND r.raid_id=s.raid_id';
		$sql['WHERE'] .= ' AND c.character_id=s.character_id';
		$sql['WHERE'] .= " AND c.profile_id={$profile}";
	} elseif($profile) {
		$sql['WHERE'] .= " AND r.profile_id={$profile}";
	}
	$sql['SORT'] = 'r.start_time '.(($old==1)?'DESC':'ASC');

	$raid_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($data = $db_raid->sql_fetchrow($raid_result)) {
		// setup date and time
		$invite_time = newDate($pConfig['time_format'], $data['invite_time'], 0);
		$start_time = newDate($pConfig['time_format'], $data['start_time'], 0);
		$date = newDate($pConfig['date_format'], $data['start_time'], 0);

		// strip message down to basics
		$description = formatText($data['description'], '_NOHTML_', 25).'...';

		$admin = '';
		// admin options
		if($pMain->checkPerm('edit_raids_any') || ($pMain->checkPerm('edit_raids_own') && ($pMain->getProfileID() == getProfileFromTable('raid', 'raid_id', $data['raid_id'])))) {
			$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option=com_raids&task=edit&id='.$data['raid_id'].'"><i class="material-icons md-12">edit</i></a>';  
		}

		// setup array for data output
		array_push($array,
			array(
				'location' => '<a href="index.php?option=com_view&id='.$data['raid_id'].'">'.$data['location'].'</a>',
				'officer' => $data['raid_leader'],
				'date' => $date,
				'invite_time' => $invite_time,
				'start_time' => $start_time,
				'totals' => $totals,
				'info' => $info,
				'edit'=>$admin,
				'checkbox'=>'<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['raid_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>',
			)
		);
	}

	return($array);
}

// adds all the users signups into session
function getSignupInfo($pMain) {
	global $db_raid, $pConfig;

	if($pMain->checkPerm('allow_signup')) {
		// clear signups
		unset($_SESSION['signups']);

		// get a list of all raids and status
		$sql['SELECT'] = 's.raid_id, s.cancel, s.queue, s.comments';
		$sql['FROM'] = array('raid AS r','signups as s','character as c');
		$sql['WHERE'] = 'r.raid_id=s.raid_id AND s.character_id=c.character_id AND c.profile_id='.$pMain->getProfileID();
		$result = $db_raid->set_query('select',$sql, __FILE__, __LINE__);

		while($data = $db_raid->sql_fetchrow($result)) {
			$_SESSION['signups'][$data['raid_id']]['cancel'] = $data['cancel'];
			$_SESSION['signups'][$data['raid_id']]['queue'] = $data['queue'];
			$_SESSION['signups'][$data['raid_id']]['comments'] = $data['comments'];
		}
	} else {
		return false;
	}
}

// displays the popup signup form
function signupForm($data, $pMain, $redirect = null, $showComment = true, $showOthers = false) {
	global $pLang, $pConfig, $db_raid;

	$characters = getUnsignedCharacters($data['raid_id'], $pMain->getProfileID(), $showOthers);
	$defaultChar = 0;

	// verify they have a character to signup with
	if(count($characters)>0) {
		// setup roles
		unset($sql);
		$sql['SELECT'] = '*';
		$sql['FROM'] = array('role AS a', 'raid_limits AS b');
		$sql['WHERE'] = "a.role_id=b.role_id
						AND b.raid_id={$data['raid_id']}
						AND b.raid_limit!=0";
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		$role_result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

		if($db_raid->sql_numrows($role_result) == 0) {
			$output = $pLang['siNoRoles'];
		} else {
			// setup table for signup information
			$roles = array();
			while($role_data = $db_raid->sql_fetchrow($role_result)) {
				$roles[$role_data['role_id']] = $role_data['role_name'];
			}
			$showApprove = (!$pConfig['auto_queue']) || ($pMain->getProfileID() == getProfileFromTable('raid', 'raid_id', $data['raid_id'])) || $pMain->checkPerm('edit_subscriptions_any') || ($pMain->checkPerm('edit_subscriptions_own'));
		}
	}
	$div_id = $data['raid_id'];
	$form = buildForm('signup'.$div_id.(($showOthers == true)?'Other':''),'index.php?option=com_signup&amp;id='.$data['raid_id'],(!empty($redirect)?$redirect:false),true,true,true,!$showOthers,true,$showApprove,$characters,$roles,false,false);
	return $form;
}

// determines if user has permissions to signup and they pass all criteria
// 0 - not signed up
// 1 - signed up
// 2 - not allowed to signup
function checkSignup($array, $pMain, $show_icon = 0, $redirect = null, $raidview = null) {
	global $pLang, $db_raid, $pConfig;

	// check permissions
	if($pMain->checkPerm('allow_signup')) {
		// check signed
		unset($sql);
		$sql['SELECT'] = 'COUNT(*)';
		$sql['FROM'] = 'signups';
		$sql['WHERE']  = 'profile_id='.$pMain->getProfileID()
						. "\n AND cancel=0"
						. "\n AND queue=0"
						. "\n AND raid_id=".$array['raid_id'];

		$count = $db_raid->get_count($sql);

		if($count > 0) {
			if($show_icon) {
				if ($raidview  == null) {
					$icon = '<div class="div-left"><span class="btn icone--table-signup icone--approved"><i class="material-icons md-14">event_available</i></span></div>';
				} elseif ($raidview  == true) {
					$icon = '<span class="btn icone--raid-signup icone--approved"><i class="material-icons md-16">event_available</i></span>';
				}
				return $icon;
			} else {
				return 1;
			}
		}

		// check cancelled
		unset($sql);
		$sql['SELECT'] = 'COUNT(*)';
		$sql['FROM'] = 'signups';
		$sql['WHERE']  = 'profile_id='.$pMain->getProfileID()
						. "\n AND cancel=1"
						. "\n AND queue=0"
						. "\n AND raid_id=".$array['raid_id'];

		$count = $db_raid->get_count($sql);

		if($count > 0) {
			if($show_icon) {
				if ($raidview  == null) {
					$icon = '<div class="div-left"><span class="btn icone--table-signup icone--cancelled"><i class="material-icons md-14">event_busy</i></span></div>';
				} elseif ($raidview  == true) {
					$icon = '<span class="btn icone--raid-signup icone--cancelled"><i class="material-icons md-16">event_busy</i></span>';
				}
				return $icon;
			} else {
				return 1;
			}
		}

		// check queued
		unset($sql);
		$sql['SELECT'] = 'COUNT(*)';
		$sql['FROM'] = 'signups';
		$sql['WHERE']  = 'profile_id='.$pMain->getProfileID()
						. "\n AND cancel=0"
						. "\n AND queue=1"
						. "\n AND raid_id=".$array['raid_id'];

		$count = $db_raid->get_count($sql);

		if($count > 0) {
			if($show_icon) {
				if ($raidview  == null) {
					$icon = '<div class="div-left"><span class="btn icone--table-signup icone--queued"><i class="material-icons md-14">hourglass_empty</i></span></div>';
				} elseif ($raidview  == true) {
					$icon = '<span class="btn icone--raid-signup icone--queued"><i class="material-icons md-16">hourglass_empty</i></span>';
				}
				return $icon;
			} else {
				return 1;
			}
		}

		if (!($pMain->checkPerm('edit_subscriptions_own') || $pMain->checkPerm('edit_subscriptions_any'))) {
			if(isFrozen($array)) {
				if($show_icon) {
					if ($raidview  == null) {
						$icon = '<div class="div-left"><span class="btn icone--table-signup icone--frozen"><i class="material-icons md-14">lock_outline</i></span></div>';
					} elseif ($raidview  == true) {
						$icon = '<span class="btn icone--raid-signup icone--frozen"><i class="material-icons md-16">lock_outline</i></span>';
					}
					return $icon;
				} else {
					return 1;
				}
			}
		}

		// default icon and allow signup
		if($show_icon) {
			$div_id = $array['raid_id'];
			if ($raidview  == null) {
				$icon = '<div class="div-right"><a class="btn btn--raidSignup btn--bg" data-toggle="modal" data-poload="index.php?option=com_frontpage&amp;task=modal&amp;raidId='.$div_id.'"><i class="material-icons md-14">assignment_ind</i></a></div>';
			} elseif ($raidview = true) {
				$icon = '<a class="btn btn--raidSignup btn--bg" data-toggle="modal" data-poload="index.php?option=com_view&amp;task=modal&amp;raidId='.$div_id.'&amp;signupType=own"><i class="material-icons md-16">assignment_ind</i></a>';
			}
			return ((isExpired($array))?'':$icon);
		} else {
			return ((isExpired($array))?2:0);
		}
	}
}

// returns all signup information
function getSignup($raidId, $cancel = 0, $queue = 0, $num, $order = 'timestamp') {
	global $pLang, $db_raid, $pMain, $p, $pConfig;

	$temp = array();

	// setup templating base
	if($cancel == 1) {
		$t_name = 'cancelled';
	} else if($queue == 1) {
		$t_name = 'queued';
	} else if($queue == 0 && $cancel == 0) {
		$t_name = 'approved';
	}

	$role_font_color = array();

	// setup popup roles
	$option = '';

	// get roles
	$sql['SELECT'] = 'count(s.role_id) available,l.*,r.*';
	$sql['FROM'] = array('raid_limits l','role r');
	$sql['JOIN'] = array(
		array('TYPE'=>'LEFT','TABLE'=>'signups s','CONDITION'=>'s.raid_id=l.raid_id AND s.role_id=l.role_id AND s.cancel=0 AND s.queue=0')
	);
	$sql['WHERE'] = 'l.role_id = r.role_id AND l.raid_id = '.$raidId.' AND l.raid_limit != 0';
	$sql['GROUPBY'] = 'r.role_id';

	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$role_list = array();
	$total_available = 0;
	while($role_data = $db_raid->fetch()) {
		$option .= '<option value="'.$role_data['role_id'].'">'.$role_data['role_name'].'</option>';
		$roles[$role_data['role_id']] = $role_data['role_name'];
		$role_font_color[$role_data['role_id']] = $role_data['font_color'];
		$header_colors[$role_data['role_id']] = $role_data['header_color'];
		$header_names[$role_data['role_id']] = $role_data['role_name'];
		$role_limit[$role_data['role_id']] = $role_data['raid_limit'];
		$role_available[$role_data['role_id']] = $role_data['available'];
		$total_available += $role_data['available'];
	}

	$temp = array();
	//if($cancel == 0) {
		if (isset($roles)) {
			foreach($roles as $key=>$value) {
				$temp[$key] = array();
			}
		}
	//}

	// Get raidowner and max number of people
	unset($sql);
	$sql['SELECT'] = 'expired,start_time,maximum,profile_id,freeze_time';
	$sql['FROM'] = 'raid';
	$sql['WHERE'] = 'raid_id='.$raidId;
	$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$raid=$db_raid->sql_fetchrow($result);
	$isRaidOwner = ($pMain->getProfileID() == $raid['profile_id']);
	$isExpired = isExpired($raid);
	$isFrozen = isFrozen($raid);

	unset($sql);
	$count = 0; // place holder for roles, increment on each new signup for each role
	$sql['SELECT'] = 's.raid_id,r.role_id,c.character_id,c.profile_id,c.class_id,cls.class_name,cls.class_color,c.char_name,r.body_color,r.role_name,s.timestamp,s.comments,c.spe1_id,c.spe2_id';
	$sql['FROM'] = array('signups s','character c','role r');
	$sql['JOIN'] = array('TYPE'=>'LEFT','TABLE'=>'class cls','CONDITION'=>'cls.class_id=c.class_id');
	$sql['WHERE'] = 's.character_id = c.character_id AND s.role_id = r.role_id AND s.raid_id = '.$raidId;

	// setup SQL append information (are they cancelled or queued?)
	if($cancel) $sql['WHERE'] .= ' AND s.cancel = 1';
	if($queue) $sql['WHERE'] .= ' AND s.queue = 1';
	if($cancel == 0 && $queue == 0) {
		$sql['WHERE'] .= ' AND s.queue = 0 AND s.cancel = 0';
	}

	switch ($order) {
		case 'name':
			$order='c.char_name';
			break;
		case 'timestamp':
			$order='s.timestamp';
			break;
	} // switch
	$sql['SORT'] = $order;

	$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($data = $db_raid->sql_fetchrow($result)) {
		$isCharOwner = ($pMain->getProfileID() == $data['profile_id']);
		// keep track of our onclick ids
		$div_id = $data['character_id'].$t_name;

		// add admin options if they own the character or if they have raid editing permissions
		// first if they have editing permissions

		// defaults
		$approve_img = '';
		$cancel_img = '';
		$queue_img = '';
		$delete_img = '';
		$change_img = '';

		// setup comments
		$default = ((!empty($data['comments']))?$data['comments']:((!empty($pLang['empty_comment']))?$pLang['empty_comment']:'n/a'));
		
		// Show edit comment if:
		// Raid is not expired AND one of the following:
		// - Person is the raidleader
		// - Person has the 'edit_subscription_any' right
		// - Person is the character owner
		if (!$isExpired &&
			($isRaidOwner ||
			$pMain->checkPerm('edit_subscriptions_any') ||
			$isCharOwner)) {
			$default = str_replace('"','',$default);
			if ($default != $pLang['empty_comment'] &&  $default != ' ') {
				$comments = '<span class="btn btn--raidComment btn--characterCommentExist" data-toggle="popover" data-placement="left" data-poload="index.php?option=com_view&amp;task=ajax&amp;raidId='.$raidId.'&amp;charId='.$data['character_id'].'"><i class="material-icons md-20">message</i></span>';
			} else {
				$comments = '<span class="btn btn--raidComment btn--characterComment btn--hide"><i class="material-icons md-20">chat_bubble_outline</i></span>';
				//$comments = '';
			}
		} else {
			if ($default != $pLang['empty_comment'] &&  $default != ' ') {
				$comments = '<span class="btn btn--raidComment btn--characterCommentExist" data-toggle="popover" data-placement="left" data-poload="index.php?option=com_view&amp;task=ajax&amp;raidId='.$raidId.'&amp;charId='.$data['character_id'].'"><i class="material-icons md-20">message</i></span>';
			} else {
				$comments = '';
			}
		}

		// Show Confirm and Available if:
		// Raid is not expired AND one of the following:
		// - Person is the raidleader
		// - Person has the 'edit_subscription_any' right
		// - Raid is not frozen AND Person is the character owner
		if (!$isExpired &&
			($isRaidOwner ||
			$pMain->checkPerm('edit_subscriptions_any') ||
			(!$isFrozen && $isCharOwner))) {
			$cancel_img = '<a class="btn btn--raidCharacter btn--characterCancel" href="index.php?option=com_view&amp;task=manage&amp;type=cancel&amp;id='.$raidId.'&amp;char_id='.$data['character_id'].'"><i class="material-icons md-16">event_busy</i></a>';
			$queue_img = '<a class="btn btn--raidCharacter btn--characterQueue" href="index.php?option=com_view&amp;task=manage&amp;type=queue&amp;id='.$raidId.'&amp;char_id='.$data['character_id'].'"><i class="material-icons md-16">hourglass_empty</i></a>';
		}

		// Show approve if:
		// Raid is not expired AND number of confirmed people are less than the configured raid limit. AND one of the following:
		// - Person is the raidleader
		// - Person has the 'edit_subscription_any' right
		// - Raid is not frozen AND Person is the character owner and has the right 'edit_subscription_own' or auto_queue is off AND the number of people approved to the character role is less than the raid limit
		if(!$isExpired &&
			$total_available<$raid['maximum'] &&
			($isRaidOwner ||
			$pMain->checkPerm('edit_subscriptions_any') ||
			(!$isFrozen &&
			(($isCharOwner && ($pMain->checkPerm('edit_subscriptions_own')) && ($role_available[$data['role_id']]<$role_limit[$data['role_id']])))))) {
			$approve_img = '<a class="btn btn--raidCharacter btn--characterApprove" href="index.php?option=com_view&amp;task=manage&amp;type=approve&amp;id='. $raidId.'&amp;char_id='.$data['character_id'].$test.'"><i class="material-icons md-16">event_available</i></a>';
		}

		// Show delete signup if:
		// Raid is not expired AND one of the following:
		// - Person is the raidleader
		// - Person has the 'edit_subscription_any' right
		// - Raid is not frozen AND person is the character owner AND has the right 'edit_subscription_own'
		if(!$isExpired &&
			($isRaidOwner ||
			$pMain->checkPerm('edit_subscriptions_any') ||
			(!$isFrozen && $isCharOwner && $pMain->checkPerm('edit_subscriptions_own')))) {
			$delete_img = '<a class="btn btn--raidCharacter btn--characterCancel" href="index.php?option=com_view&amp;task=manage&amp;type=remove&amp;id='.$raidId.'&amp;char_id='.$data['character_id'].'" onClick="return display_confirm(\''.$pLang['confirm_delete'].'\')"><i class="material-icons md-16">clear</i></a>';
		}
		// Show change role and change character if:
		// Raid is not expired AND one of the following:
		// Person is the raidleader
		// Person has the 'edit_subscription_any' right
		// Raid is not frozen AND person is the character owner and has the right 'edit_subscription_own' and the character is queued
		
		//$change_img  = '<a class="btn btn--raidEdit btn--bg btn--hide"><i class="material-icons md-16">edit</i></a>';
		if(!$isExpired &&
			($isRaidOwner ||
			$pMain->checkPerm('edit_subscriptions_any') ||
			//(!$isFrozen && $isCharOwner && ($pMain->checkPerm('edit_subscriptions_own') || $queue == 1 || $cancel == 1)))) {
			(!$isFrozen && $isCharOwner))) {
			$charlist = getUnsignedCharacters( $raidId,$data['profile_id'],false,true);
			if (!empty($charlist) && $isCharOwner) {
				$change_img  = '<a class="btn btn--raidEdit btn--bg" data-toggle="modal" data-poload="index.php?option=com_view&amp;task=modal&amp;raidId='.$raidId.'&amp;charId='.$data['character_id'].'&amp;signupType=editown&amp;queue='.$queue.'&amp;cancel='.$cancel.'"><i class="material-icons md-16">edit</i></a>';
			} else {
				$change_img  = '<a class="btn btn--raidEdit btn--bg" data-toggle="modal" data-poload="index.php?option=com_view&amp;task=modal&amp;raidId='.$raidId.'&amp;charId='.$data['character_id'].'&amp;signupType=editother"><i class="material-icons md-16">edit</i></a>';
			}
		}

		// check for multiclass
		if($pConfig['multi_class']) {
			// get subclasses
			unset($sql);
			$sql['SELECT'] = 'cls.class_name';
			$sql['FROM'] = 'subclass s';
			$sql['JOIN'] = array('TYPE'=>'LEFT','TABLE'=>'class cls','CONDITION'=>'cls.class_id=s.class_id');
			$sql['WHERE'] = "character_id = {$data['character_id']}";
			$r_multi = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

			$tooltip = '';

			while($data2 = $db_raid->sql_fetchrow($r_multi)) {
				$tooltip .= '<br>'.$data2['class_name'];
			}

			$tooltip = $data['class_name'].'<br><br><strong>'.$pLang['subclasses'].'</strong>'.$tooltip;
		} else {
			$tooltip = $data['class_name'];
		}

		// setup class icon
		$path = RAIDER_BASE_PATH.'games/'.$pConfig['game'].'/images/classes/%s.png';

		if(is_file(sprintf($path,strtolower(str_replace(' ', '', $data['class_name']))))) {
			if ($data['spe1_id'] != 0 || $data['spe2_id'] != 0) {
				$class_img = '<span class="tooltip--spe" data-toggle="tooltip" data-placement="right" data-poload="index.php?option=com_view&amp;task=spe&amp;charId='.$data['character_id'].'"><img src="'.str_replace(RAIDER_BASE_PATH.'', '', sprintf($path,strtolower(urlencode(str_replace(' ', '', $data['class_name']))))).'" class="img--class" alt="'.$data['class_name'].'"></span>';
			} else {
				$class_img = '<img src="'.str_replace(RAIDER_BASE_PATH.'', '', sprintf($path,strtolower(urlencode(str_replace(' ', '', $data['class_name']))))).'" class="img--class" alt="'.$data['class_name'].'">';
			}
			
		} else {
			$class_img = '';
		}

		// strip name down to size
		if(strlen($data['char_name']) > 10) {
			$char_name = substr($data['char_name'], 0, 9).'...';
		} else {
			$char_name = $data['char_name'];
		}

		$temp_array = array(
			'timestamp' => newDate($pConfig['date_format'], $data['timestamp'], $pConfig['timezone'] + $pConfig['dst'])
							.' @ '.newDate($pConfig['time_format'], $data['timestamp'], $pConfig['timezone'] + $pConfig['dst']),
			'char_name' => $char_name,
			'char_id' => $data['character_id'],
			'comments' => $comments,
			'body_color' => ((preg_match('/^[0-9a-f]{6}$/i',$data['body_color'])?'#':'')).$data['body_color'],
			'class_color' => ((preg_match('/^[0-9a-f]{6}$/i',$data['class_color'])?'#':'')).$data['class_color'],
			'role_name' => $data['role_name'],
			'approve_img' => $approve_img,
			'cancel_img' => $cancel_img,
			'queue_img' => $queue_img,
			'delete_img' => $delete_img,
			'class_img' => $class_img,
			'move_img' => $change_img,
			'checkbox' => '<input type="checkbox" class="post">',
			'class_name' => $data['class_name']
		);

		// populate output array
		foreach($temp_array as $key=>$value) {
			$temp[$data['role_id']][$count][$key] = $value;
		}

		$count++;
	}
		
	// parse array and setup output
	$count = 0;
	$output = array();
	unset($sql);
	foreach($temp as $header_id=>$header_array) {
		if (!empty($role_limit[$header_id])) {
			// header information
			$p->assign( array(
					'role_name' => $header_names[$header_id],
					'header_color' => ((preg_match('/^[0-9a-f]{6}$/i',$header_colors[$header_id])?'#':'')).$header_colors[$header_id],
					'font_color' => ((preg_match('/^[0-9a-f]{6}$/i',$role_font_color[$header_id])?'#':'')).$role_font_color[$header_id],
					'role_count' => '('.count($header_array).'/'.$role_limit[$header_id].')'
			));
			$output[$count] = $p->fetch(RAIDER_TEMPLATE_PATH.'view_'.$t_name.'_headers.tpl');

			// body information
			foreach($header_array as $key=>$value) {
				$p->assign($value);
				$output[$count] .= $p->fetch(RAIDER_TEMPLATE_PATH.'view_'.$t_name.'_body.tpl');
			}

			// footer
			$output[$count] .= $p->fetch(RAIDER_TEMPLATE_PATH.'view_'.$t_name.'_footers.tpl');

			$count++;
		}
	}

	// now that we have the individual tables create the encapsulating table
	$rows = ceil((count($output) / $num));

	$signups = '';

	// handle empty case
	if(count($output) == 0) {
		$signups .= '';
	} else {
		for($i = 1; $i <= $rows; $i++) {

			for($j = ($num*$i)-($num-1); $j <= ($num*$i); $j++) {
				$signups .= (empty($output[$j-1])?'':'<div class="col-12 col-sm-6 col-lg-4 div--raidSignup">'.$output[$j-1].'</div>');
			}
		}
	}

	return $signups;
}

function buildForm($div_id,$formAction,$redirect,$showCharacters,$showRoles,$showSignupType,$showComment,$showHeader,$showApprove,$characters,$roles,$defaultRole,$comment) {
	global $pLang,$pConfig;

	$output .= '<div class="modal fade" id="modal--raid" tabindex="-1" role="dialog" aria-labelledby="modalLabel--raid" aria-hidden="true">';
	$output .= '<div class="modal-dialog raid-modal-dialog" role="document">';
	$output .= '<div class="modal-content raid-modal-content">';
	$output .= '<form method="post" action="'.$formAction.'">';
	$output .= '<div class="modal-header raid-modal-header">';
	$output .= '<div class="modal-title--center">';
	$output .= '<h4 class="modal-title justify-content-center" id="modalLabel--raid">Inscription</h4>';
	$output .= '</div>';
	$output .= '<div class="modal-close">';
	$output .= '<button type="button" class="close raid-btn-close" data-dismiss="modal" aria-label="close">';
	$output .= '<span aria-hidden="true"><i class="material-icons md-16">close</i></span>';
	$output .= '</button>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="modal-body raid-modal-body">';
	if (!empty($redirect)) {
		$output .= '<input type="hidden" name="redirect" value="'.$redirect.'">';
	}
	if ($showCharacters==true && (empty($characters) || count($characters)==0)) {
		$formError = $pLang['siNoChar'];
	} elseif ($showRoles==true && (empty($roles) || count($roles)==0)) {
		$formError = 'No Roles available';
	}
	if (empty($formError)) {
		if ($showCharacters==true) {
			$output .= '<div class="form-group row form-group-row">';
			$output .= '<label for="Character" class="col-12 col-sm-6 col-form-label inputCard--Label">Character :</label>';
			$output .= '<div class="col-12 col-sm-6">';
			$output .= '<select class="form-control  inputCard inputCard-border" id="Character" name="character">';
			foreach ($characters as $key=>$character) {
				$output .= '<option value="'.$key.'"'.(($character['is_main'] == 1)?' selected':'').'>'.$character['name'].'</option>';
			}
			$output .= '</select>';
			$output .= '</div>';
			$output .= '</div>';
		}
		if ($showRoles==true) {
			$output .= '<div class="form-group row form-group-row">';
			$output .= '<label for="signup_role" class="col-12 col-sm-6 col-form-label inputCard--Label">'.$pLang['siSignup_role'].' :</label>';
			$output .= '<div class="col-12 col-sm-6">';
			$output .= '<select class="form-control  inputCard inputCard-border" id="signup_role" name="signup_role">';
			foreach ($roles as $key=>$role) {
				$output .= '<option value="'.$key.'"'.(($key==$defaultRole)?' selected':'').'>'.$role.'</option>';
			}
			$output .= '</select>';
			$output .= '</div>';
			$output .= '</div>';
		}
		if ($showSignupType==true) {
			$output .= '<div class="form-group row form-group-row">';
			$output .= '<label for="signup_type" class="col-12 col-sm-6 col-form-label inputCard--Label">'.$pLang['siSignup_type'].' :</label>';
			$output .= '<div class="col-12 col-sm-6">';
			$output .= '<select class="form-control  inputCard inputCard-border" id="signup_type" name="signup_type">';
			if ($showApprove==true) {
				$output .= '<option value="approve">'.$pLang['approve'].'</option>';
			}
			$output.= '<option value="queue"'.((!empty($pConfig['auto_queue']))?' selected':'').'>'.$pLang['queue'].'</option><option value="cancel">'.$pLang['cancel'].'</option>';
			$output .= '</select>';
			$output .= '</div>';
			$output .= '</div>';
		}
		if ($showComment == true) {
			$output .= '<div class="form-group row form-group-row m-b-0">';
			$output .= '<label for="comments" class="col-12 col-form-label inputCard--Label">'.$pLang['siComment'].' :</label>';
			$output .= '<div class="col-12">';
			$output .= '<textarea type="text" class="form-control inputCard inputCard-border" rows="5" id="comments" placeholder="'.$pLang['siComment'].'" name="comments">'.((!empty($comment))?$comment:'').'</textarea>';
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
		$output .= '<div class="modal-footer raid-modal-footer justify-content-center">';
		$output .= '<input class="btn btn--sectionFooter btn--bg" type="submit" value="Submit">';
		$output .= '</div>';
	} else {
		$output .= $formError;
	}
	$output .= '</form>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';	
	$output .= '</div>';
	
	return $output;
}

/**
 * getUnsignedCharacters()
 *
 * @param int $raid_id
 * @param int $profile_id
 * @param bool $listOthers
 * @param bool $signedUpAsDefault
 * @return
 */
function getUnsignedCharacters($raid_id, $profile_id, $listOthers = false, $signedUpAsDefault = false){
	global $db_raid;

	$sql['SELECT'] = 'c.character_id,c.role_id,c.char_name,0 as is_main';
	$sql['FROM'] = array('character c','raid r');
	$sql['WHERE'] = 'c.char_level>=r.minimum_level AND c.char_level<=r.maximum_level';
	$sql['WHERE'] .= ' AND r.raid_id='.$raid_id;

	$sql2['FROM'] = array('character c2','signups s');
	$sql2['WHERE'] = 'c2.character_id=s.character_id AND s.raid_id='.$raid_id;
	if ($listOthers == true) {
		array_push($sql['FROM'],'profile p','permissions perm');
		$sql['WHERE'] .= ' AND p.profile_id=c.profile_id AND perm.group_id=p.group_id AND perm.permission_name=\'allow_signup\' AND perm.permission_value=1';

		$sql2['SELECT'] = 'c2.profile_id';
		$sql['WHERE'] .= ' AND c.profile_id NOT IN ('.$db_raid->parse_query('select', $sql2).')';
		$sql['WHERE'] .= ' AND c.profile_id !='.$profile_id;
	} else {
		$sql2['SELECT'] = 'c2.character_id';
		if (!$signedUpAsDefault) {
			$sql['WHERE'] .= ' AND c.character_id NOT IN ('.$db_raid->parse_query('select', $sql2).')';
		}
		$sql['WHERE'] .= ' AND c.profile_id = '.$profile_id;
	}
	if ($signedUpAsDefault) {
		$sql['SELECT'] .= ',NOT ISNULL(s.raid_id) as is_signed';
		$sql['JOIN'] = array('TYPE'=>'LEFT','TABLE'=>'signups s','CONDITION'=>'s.raid_id=r.raid_id AND s.character_id=c.character_id');
	} else {
		$sql['SELECT'] .= ',0 as is_signed';
	}

	$sql['SORT'] = 'c.char_name';

	$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$charlist = array();
	while($data = $db_raid->sql_fetchrow($result)) {
		if ($data['is_main'] == 1) {
			$is_main = $data['character_id'];
		}
		if ($data['is_signed'] == 1) {
			$is_signed =  $data['character_id'];
		}
		$charlist[$data['character_id']]['name'] = htmlentities($data['char_name'],ENT_SUBSTITUTE,'ISO-8859-1');
		$charlist[$data['character_id']]['defaultRole'] = $data['role_id'];
		$charlist[$data['character_id']]['is_main'] = 0;
	}
	if ($signedUpAsDefault==true && !empty($is_signed)) {
		$is_main = $is_signed;
	}
	if (!empty($is_main)) {
		$charlist[$is_main]['is_main'] = 1;
	}
	return $charlist;
}

function isFrozen($raidData){
	global $pConfig;
	$result = false;

	if ($pConfig['disable_freeze'] == 0) {
		// setup freeze time
		$offset = 3600 * ($raidData['freeze_time'] + ($pConfig['timezone'] + $pConfig['dst']) / 100); // Seconds from GMT
		$freeze_time = $raidData['start_time']-$offset;

		$result = ((time() >= $freeze_time)?true:false);
	}
	return $result;
}

function isExpired($raidData,$update = false){
	global $pConfig, $db_raid;
	$result = true;

	if ($raidData['expired'] == 0) {
		if (time() >= $raidData['start_time'] - (36 * ($pConfig['timezone'] + $pConfig['dst']))) {
			if ($update == true) {
				$sql['UPDATE'] = 'raid';
				$sql['VALUES'] = array('expired'=>1);
				$sql['WHERE'] = 'raid_id='.$raidData['raid_id'];
				$db_raid->set_query('update', $sql, __FILE__, __LINE__);
			}
		} else {
			$result = false;
		}
	}
	return $result;
}

function getSignupLight($raidId, $charId, $signupType,$queue=1,$cancel= 1) {
	global $pLang, $db_raid, $pMain, $p, $pConfig;
  
	// get roles
	$sql['SELECT'] = 'count(s.role_id) available,l.*,r.*';
	$sql['FROM'] = array('raid_limits l','role r');
	$sql['JOIN'] = array(
		array('TYPE'=>'LEFT','TABLE'=>'signups s','CONDITION'=>'s.raid_id=l.raid_id AND s.role_id=l.role_id AND s.cancel=0 AND s.queue=0')
	);
	$sql['WHERE'] = 'l.role_id = r.role_id AND l.raid_id = '.$raidId.' AND l.raid_limit != 0';
	$sql['GROUPBY'] = 'r.role_id';

	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($role_data = $db_raid->fetch()) {
		$roles[$role_data['role_id']] = $role_data['role_name'];
	}

	unset($sql);
	$sql['SELECT'] = 's.raid_id,r.role_id,c.character_id,c.profile_id,c.class_id,c.char_name,r.role_name,s.timestamp,s.comments';
	$sql['FROM'] = array('signups s','character c','role r');
	$sql['WHERE'] = 's.character_id = c.character_id AND s.role_id = r.role_id AND s.raid_id = '.$raidId.' AND s.character_id='.$charId;
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$data = $db_raid->fetch();
	$isCharOwner = ($pMain->getProfileID() == $data['profile_id']);
   
	// setup comments
	$default = ((!empty($data['comments']))?$data['comments']:((!empty($pLang['empty_comment']))?$pLang['empty_comment']:'n/a'));

	// Generate modal code
		$charlist = getUnsignedCharacters($raidId,$data['profile_id'],false,true);
		if ($signupType == "editown") {
			if ($queue==0 && $cancel== 0) {
				$signupModalEdit = buildForm('move'.$div_id,'index.php?option=com_view&amp;task=change&amp;id='.$data['raid_id'].'&amp;old_char_id='.$data['character_id'],false,false,false,false,true,false,false,$charlist,$roles,$data['role_id'],$default);
			} else {
				$signupModalEdit = buildForm('move'.$div_id,'index.php?option=com_view&amp;task=change&amp;id='.$data['raid_id'].'&amp;old_char_id='.$data['character_id'],false,true,true,false,true,false,false,$charlist,$roles,$data['role_id'],$default);
			}
		} elseif ($signupType == "editother") {
				$signupModalEdit = buildForm('move'.$div_id,'index.php?option=com_view&amp;task=change&amp;id='.$data['raid_id'].'&amp;char_id='.$data['character_id'].'&amp;old_char_id='.$data['character_id'],false,false,true,false,false,false,false,false,$roles,$data['role_id'],$default);					
		}

	return $signupModalEdit;
}
 
?>