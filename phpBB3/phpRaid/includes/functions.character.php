<?php
// gets character data and returns in an associate array
function getCharacterData($pMain, $profile_id = '') {
	global $db_raid, $pConfig, $pLang;

	// setup attributes
	$sql['SELECT'] = '*';
	$sql['FROM'] = 'attribute';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($data = $db_raid->fetch()) {
		$pAttributes[$data['attribute_id']] = $data['att_name'];
	}

	$phpr_a = array();

	$sql['SELECT'] = 'c.*,cls.class_name,g.guild_name,r.race_name,ge.gender_name,sp1.spe_name as spe1_name,sp2.spe_name as spe2_name';
	$sql['FROM'] = array('character c','class cls','race r','gender ge');
	$sql['JOIN'] = array(
						array('TYPE'=>'LEFT','TABLE'=>'guild g','CONDITION'=>'c.guild_id=g.guild_id'),
						array('TYPE'=>'LEFT','TABLE'=>'spe sp1','CONDITION'=>'c.spe1_id=sp1.spe_id'),
						array('TYPE'=>'LEFT','TABLE'=>'spe sp2','CONDITION'=>'c.spe2_id=sp2.spe_id')
					);
	$sql['WHERE'] = 'c.class_id=cls.class_id AND c.race_id=r.race_id AND ge.gender_id=c.gender_id';
	if(!empty($profile_id)) $sql['WHERE'] .= ' AND `profile_id`='.$profile_id;
	$char_res = $db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($data = $db_raid->sql_fetchrow($char_res)) {
		// admin options
		$admin = '';
		$checkbox = '';

		if(($pMain->getProfileID() == $data['profile_id']) || $pMain->checkPerm('edit_characters_any')) {
			$admin = '<a class="btn btn--table-edit btn--outline" href="index.php?option=com_characters&task=edit&id='.$data['character_id'].'"><i class="material-icons md-14">edit</i></a>';
			$checkbox = '<label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="select[]" name="select[]" value="'.$data['character_id'].'" aria-label="..."><span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span></label>';
		}

		// setup race icon
		$path = RAIDER_BASE_PATH.'games/'.$pConfig['game'].'/images/races//%s/%s.png';

		if(is_file(sprintf($path,strtolower($data['gender_name']),strtolower(str_replace(' ', '', $data['race_name']))))) {
			$race = '<img class="img--gender" src="'.str_replace(RAIDER_BASE_PATH.'', '', sprintf($path,urlencode(strtolower($data['gender_name'])),urlencode(strtolower(str_replace(' ', '', $data['race_name']))))).'" alt="'.$data['race_name'].'">';
		} else {
			$race = $data['race_name'];
		}

		$tooltip = $data['class_name'];
		if($pConfig['multi_class']) {
			// get subclasses
			unset($sql);
			$sql['SELECT'] = '*';
			$sql['FROM'] = array('subclass s','class cls');
			$sql['WHERE'] = 's.class_id=cls.class_id AND `character_id`='.$data['character_id'];

			$result2 = $db_raid->set_query('select', $sql, __FILE__, __LINE__);
			if ($db_raid->sql_numrows($result2)>0) {
				$tooltip .= '<br><br><strong>'.$pLang['subclasses'].'</strong>';
				while($data2 = $db_raid->sql_fetchrow($result2)) {
					$tooltip .= '<br>'.$data2['class_name'];
				}
			}

		}

		// setup class icon
		$path = RAIDER_BASE_PATH.'games/'.$pConfig['game'].'/images/classes/%s.png';

		if(is_file(sprintf($path,strtolower(str_replace(' ', '', $data['class_name']))))) {
			$class = '<img class="img--class" src="'.str_replace(RAIDER_BASE_PATH.'', '', sprintf($path,strtolower(urlencode(str_replace(' ', '', $data['class_name']))))).'" alt="'.$data['class_name'].'">';
		} else {
			$class = $data['class_name'];
		}

		// attributes
		$tooltip = '';

		unset($sql);
		$sql['SELECT'] = $data['character_id'].' as character_id,IFNULL(d.att_value,\'\') as att_value,a.*';
		$sql['FROM'] = 'attribute a';
		$sql['JOIN'] = array('TYPE'=>'LEFT','TABLE'=>'attribute_data d','CONDITION'=>'d.attribute_id=a.attribute_id AND d.character_id='.$data['character_id']);

		$att_result =  $db_raid->set_query('select', $sql, __FILE__, __LINE__);

		unset($merge);
		while($att_data = $db_raid->sql_fetchrow($att_result)) {
			$merge[$att_data['att_name']] = $att_data['att_value'];

			if($att_data['att_hover']) {
				$tooltip .= $att_data['att_name'].' - '.$att_data['att_value'].'<br>';
			}
		}

		// setup name
		if(empty($tooltip))
			$tooltip = '';
		else
			$tooltip = '';

		$name = $data['char_name'];

		// setup array for data output
		$merge2 = array(
					'name' => $name,
					'guild' => (empty($data['guild_name'])?'':$data['guild_name']),
					'race' => $race,
					'class' => $class,
					'level' => $data['char_level'],
					'spe1_name' => $data['spe1_name'],
					'spe2_name' => $data['spe2_name'],
					'ilvl' => $data['ilvl'],
					'edit' =>  $admin,
					'checkbox' => $checkbox
		);

		// merge error check
		if(empty($merge)) {
			$merge = array();
		}

		array_push($phpr_a, array_merge($merge, $merge2));
	}

	return $phpr_a;
}
?>