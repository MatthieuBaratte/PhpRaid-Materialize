<?php
// no direct access
defined('_VALID_RAID') or die('Restricted Access');

// load footer?
$load_footer = 1;

if(empty($task) || $task == '') {
	// show calendar
	if($pMain->checkPerm('view_raids') || $pConfig['allow_anonymous']) {
		// setup calendar class
		require_once(RAIDER_INCLUDE_PATH.'calendar.php');
		
		$raidmodal= '';

		$yearID = (isset($_GET['yearID'])?intval($_GET['yearID']):date("Y", time()));
		$monthID = (isset($_GET['monthID'])?intval($_GET['monthID']):date("n", time()));
		$dayID = (isset($_GET['dayID'])?intval($_GET['dayID']):false);

		$cal = new prCalendar($yearID, $monthID, $dayID);
		$cal_resp = new prCalendar($yearID, $monthID, $dayID);

		// calculate times
		$lower = gmmktime('0','0','0',$monthID, '1', $yearID);
		$upper = gmmktime('0','0','0',$monthID + 1, '1', $yearID);

		$sql['SELECT'] = '*';
		$sql['FROM'] = 'raid';
		$sql['WHERE'] = 'raid_id > 0 AND start_time >= '.$lower.' AND start_time <= '.$upper; // only show raids from a month ago and up
		$sql['SORT'] = 'start_time ASC';
		$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

		while($data = $db_raid->sql_fetchrow($result)) {
			// check if raid is old and update the tables if it is.
			if($data['expired'] == 0) {
				isExpired($data,true);
			}

			$tooltip = 'index.php?option=com_frontpage&amp;task=ajax&amp;id='.$data['raid_id'];
			$icon = setIcon('_RAID_', $data['icon_name']);
			$icon_info = '<a tabindex="'.$data['raid_id'].'" class="btn btn--table-info btn--outline" data-toggle="popover" data-placement="left" data-poload="'.$tooltip.'"><i class="material-icons md-18">info_outline</i></a>';

			// edit icon if admin
			if($pMain->getLogged()) {
				if(($pMain->checkPerm('edit_raids_any')) || ($pMain->checkPerm('edit_raids_own') && ($pMain->getProfileID() == getProfileFromTable('raid', 'raid_id', $data['raid_id'])))) {
					$admin = '<div class="div-right"><a class="btn btn--table-edit btn--bg" href="index.php?option=com_raids&amp;task=edit&amp;id='.$data['raid_id'].'"><i class="material-icons md-14">edit</i></a></div>';
					$admin .= '<div class="div-right"><a class="btn btn--table-edit btn--bg-delete" href="index.php?option=com_raids&task=raidcancel&id='.$data['raid_id'].'"><i class="material-icons md-14">block</i></a></div>';
				} else {
					$admin = '';
				}
			}

			$p->assign(
				array (
					'raid_link' => 'index.php?option=com_view&amp;id='.$data['raid_id'],
					'info' => checkSignup($data, $pMain, 1).$admin,
					'checkbox' => '',
					'raid_icon' => $icon,
					'raid_title' => $data['location'],
					'icon_info' => $icon_info
				)
			);

			// setup the look of the calendar event
			$calendar_output = $p->fetch(RAIDER_TEMPLATE_PATH.'event.tpl');
			$calendar_output_resp = $p->fetch(RAIDER_TEMPLATE_PATH.'event_resp.tpl');
			$year = newDate("Y", $data['start_time'], 0);
			$month = newDate("n", $data['start_time'], 0);
			$day = newDate("j", $data['start_time'], 0);
			$cal->addEventContent($year, $month, $day, $calendar_output);
			$cal_resp->addEventContent($year, $month, $day, $calendar_output_resp);
		}
		
		$p->assign('calendar',$cal->fetch(RAIDER_TEMPLATE_PATH.'calendar.tpl'));
		$p->assign('calendar_resp',$cal_resp->fetch(RAIDER_TEMPLATE_PATH.'calendar_resp.tpl'));
	}
} elseif($task == 'ajax') {
	ob_end_clean();

	// basic data
	$sql['SELECT'] = '*';
	$sql['FROM'] = 'raid';
	$sql['WHERE'] = 'raid_id='.$id;
	$result = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$data = $db_raid->fetch();

	// tooltip data
	$sql['SELECT'] = 'COUNT(*)';
	$sql['FROM'] = 'signups';
	$sql['WHERE'] = 'raid_id='.$id.'
					AND queue = 0
					AND cancel = 0';
	$signup_total = $db_raid->get_count($sql);

	$sql['SELECT'] = 'COUNT(*)';
	$sql['FROM'] = 'signups';
	$sql['WHERE'] = 'raid_id='.$id.'
					AND queue = 1
					AND cancel = 0';
	$queue_count_total = $db_raid->get_count($sql);

	$max = $data['maximum'];
		
	$tooltip .= '<div class="container-fluid">';
	$tooltip .= '<div class="card sectionCard">';
		// setup event variables for templating
		$tooltip .= '<div class="card-header sectionCard--header">';
			$tooltip .= '<div class="header--title text-center">'.$data['location'].'</div>';
		$tooltip .= '</div>';
		$tooltip .= '<div class="card-block sectionCard--content">';
			$tooltip .= '<div class="form-group row form-group-rowDetails">';
				$tooltip .= '<label for="invite" class="col-7 col-form-label inputCard--LabelDetails">'.$pLang['invite'].':</label>';
				$tooltip .= '<div class="col-5">';
					$tooltip .= '<label for="invite_time" class="col-form-label inputCard--LabelDetails--value">'.newDate($pConfig['time_format'], $data['invite_time'], 0).'</label>';
				$tooltip .= '</div>';
			$tooltip .= '</div>';
			$tooltip .= '<div class="form-group row form-group-rowDetails">';
				$tooltip .= '<label for="start" class="col-7 col-form-label inputCard--LabelDetails">'.$pLang['start'].':</label>';
				$tooltip .= '<div class="col-5">';
					$tooltip .= '<label for="start_time" class="col-form-label inputCard--LabelDetails--value">'.newDate($pConfig['time_format'], $data['start_time'], 0).'</label>';
				$tooltip .= '</div>';
			$tooltip .= '</div>';
			//if($pConfig['disable_freeze'] == 0) {
				//$tooltip .= '<div class="form-group row form-group-rowDetails">';
					//$tooltip .= '<label for="freezes" class="col-7 col-form-label inputCard--LabelDetails">'.$pLang['freezes'].':</label>';
					//$tooltip .= '<div class="col-5">';
						//$tooltip .= '<label for="freeze_time" class="col-form-label inputCard--LabelDetails--value ">'.newDate($pConfig['time_format'], $data['start_time']-($data['freeze_time']*3600), 0).'</label>';
					//$tooltip .= '</div>';
				//$tooltip .= '</div>';	
			//}
		$tooltip .= '</div>';
		// get the roles
		$sql['SELECT'] = '*';
		$sql['FROM'] = array('role r', 'raid_limits l');
		$sql['WHERE'] = 'r.role_id = l.role_id
						AND l.raid_id = '.$data['raid_id'];
		$result_roles = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
		
		$tooltip .= '<div class="card-header sectionCard--header">';
			$tooltip .= '<div class="header--title text-center">'.$pLang['signups'].'</div>';
		$tooltip .= '</div>';
		$tooltip .= '<div class="card-block sectionCard--content">';
			while($data_roles = $db_raid->sql_fetchrow($result_roles)) {
				// signed up
				$sql['SELECT'] = 'COUNT(*)';
				$sql['FROM'] = 'signups s';
				$sql['WHERE'] = 's.role_id='.$data_roles['role_id'].'
								AND s.cancel=0
								AND s.queue=0
								AND s.raid_id='.$id;
				$result_roles_counts = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
				$data_roles_counts = $db_raid->sql_fetchrow($result_roles_counts);
				$role_count = $data_roles_counts[0];

				// queued
				$sql['SELECT'] = 'COUNT(*)';
				$sql['FROM'] = 'signups s';
				$sql['WHERE'] = 's.role_id='.$data_roles['role_id'].'
								AND s.queue=1
								AND s.raid_id='.$data['raid_id'];
				$result_roles_counts = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
				$data_roles_counts = $db_raid->sql_fetchrow($result_roles_counts);
				$queue_count = $data_roles_counts[0];
				
				$tooltip .= '<div class="form-group row form-group-rowDetails">';
					$tooltip .= '<label for="role_name" class="col-7 col-form-label inputCard--LabelDetails">'.$data_roles['role_name'].':</label>';
					$tooltip .= '<div class="col-5">';
						$tooltip .= '<label for="raid_limit" class="col-form-label inputCard--LabelDetails--value ">'.$role_count.'/'.$data_roles['raid_limit'].' ('.$queue_count.')</label>';
					$tooltip .= '</div>';
				$tooltip .= '</div>';
			}
			$tooltip .= '<div class="content--divider"></div>';
			$tooltip .= '<div class="form-group row form-group-rowDetails">';
				$tooltip .= '<label for="total" class="col-7 col-form-label inputCard--LabelDetails">'.$pLang['total'].':</label>';
				$tooltip .= '<div class="col-5">';
					$tooltip .= '<label for="signup_total" class="col-form-label inputCard--LabelDetails--value ">'.$signup_total.'/'.$max.' ('.$queue_count_total.')</label>';
				$tooltip .= '</div>';
			$tooltip .= '</div>';
		$tooltip .= '</div>';
		// level requirements
		//$tooltip .= '<div class="card-header sectionCard--header">';
			//$tooltip .= '<div class="header--title text-center">'.$pLang['restrictions'].'</div>';
		//$tooltip .= '</div>';
		//$tooltip .= '<div class="card-block sectionCard--content">';
			//$tooltip .= '<div class="form-group row form-group-rowDetails">';
				//$tooltip .= '<label for="minimum_level" class="col-7 col-form-label inputCard--LabelDetails">'.$pLang['minimum_level'].':</label>';
				//$tooltip .= '<div class="col-5">';
					//$tooltip .= '<label for="minimum_leveldata" class="col-form-label inputCard--LabelDetails--value ">'.$data['minimum_level'].'</label>';
				//$tooltip .= '</div>';
			//$tooltip .= '</div>';
			//$tooltip .= '<div class="form-group row form-group-rowDetails">';
				//$tooltip .= '<label for="maximum_level" class="col-7 col-form-label inputCard--LabelDetails">'.$pLang['maximum_level'].':</label>';
				//$tooltip .= '<div class="col-5">';
					//$tooltip .= '<label for="maximum_leveldata" class="col-form-label inputCard--LabelDetails--value ">'.$data['maximum_level'].'</label>';
				//$tooltip .= '</div>';
			//$tooltip .= '</div>';				
		//$tooltip .= '</div>';
	
	$tooltip .= '</div>';	
	$tooltip .= '</div>';
	
	echo $tooltip;
	exit;
} elseif($task == 'modal') {
	ob_end_clean();
	unset($sql);
	$sql['SELECT'] = '*';
	$sql['FROM'] = 'raid';
	$sql['WHERE'] = 'raid_id = '.$_GET['raidId'];
	
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$pRaid = $db_raid->fetch();
	$raidmodal .=signupForm($pRaid, $pMain);

	echo $raidmodal;
	exit;
}
$p->display(RAIDER_TEMPLATE_PATH.'frontpage.tpl');
?>