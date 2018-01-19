<?php
	// ROSTER SUBMENU
    SmartyMenu::initMenu($roster_sub);

	if($pMain->checkPerm('view_roster')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mrCharacters']);
		SmartyMenu::setItemTitle($item, 'mrCharacters');
		SmartyMenu::setItemLink($item, 'index.php?option=com_roster');
		SmartyMenu::addMenuItem($roster_sub, $item);
	}

	if($pMain->checkPerm('view_members')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mrMembers']);
		SmartyMenu::setItemTitle($item, 'mrMembers');
		SmartyMenu::setItemLink($item, 'index.php?option=com_members');
		SmartyMenu::addMenuItem($roster_sub, $item);
	}

	// PROFILE SUBMENU
    SmartyMenu::initMenu($profile_sub);

	if($pMain->getLogged()) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpUpdate']);
		SmartyMenu::setItemTitle($item, 'mpUpdate');
		SmartyMenu::setItemLink($item, 'index.php?option=com_profile');
		SmartyMenu::addMenuItem($profile_sub, $item);
	}

	if($pMain->checkPerm('edit_announcements_own')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpAnnouncements']);
		SmartyMenu::setItemTitle($item, 'mpAnnouncements');
		SmartyMenu::setItemLink($item, 'index.php?option=com_announcements');
		SmartyMenu::addMenuItem($profile_sub, $item);
	}

	if($pMain->checkPerm('edit_announcements_any')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpAnnouncements']);
		SmartyMenu::setItemTitle($item, 'mpAnnouncements');
		SmartyMenu::setItemLink($item, 'index.php?option=com_announcements');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_characters_own')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpCharacters']);
		SmartyMenu::setItemTitle($item, 'mpCharacters');
		SmartyMenu::setItemLink($item, 'index.php?option=com_characters');
		SmartyMenu::addMenuItem($profile_sub, $item);
	}

	if($pMain->checkPerm('view_history_own')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpHistory']);
		SmartyMenu::setItemTitle($item, 'mpHistory');
		SmartyMenu::setItemLink($item, 'index.php?option=com_history');
		SmartyMenu::addMenuItem($profile_sub, $item);
	}

	if($pMain->checkPerm('edit_raids_own')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpRaids']);
		SmartyMenu::setItemTitle($item, 'mpRaids');
		SmartyMenu::setItemLink($item, 'index.php?option=com_raids');
		SmartyMenu::addMenuItem($profile_sub, $item);
	}

	// ADMINISTER SUBMENU
    SmartyMenu::initMenu($administer_sub);

	if($pMain->checkPerm('allow_backups')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maBackups']);
		SmartyMenu::setItemTitle($item, 'maBackups');
		SmartyMenu::setItemLink($item, 'index.php?option=com_backups');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_configuration')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maConfiguration']);
		SmartyMenu::setItemTitle($item, 'maConfiguration');
		SmartyMenu::setItemLink($item, 'index.php?option=com_configuration');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_configuration')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maLinks']);
		SmartyMenu::setItemTitle($item, 'maLinks');
		SmartyMenu::setItemLink($item, 'index.php?option=com_external_links');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_permissions')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maPermissions']);
		SmartyMenu::setItemTitle($item, 'maPermissions');
		SmartyMenu::setItemLink($item, 'index.php?option=com_permissions');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_groups')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maGroups']);
		SmartyMenu::setItemTitle($item, 'maGroups');
		SmartyMenu::setItemLink($item, 'index.php?option=com_groups');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_attributes')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maAttributes']);
		SmartyMenu::setItemTitle($item, 'maAttributes');
		SmartyMenu::setItemLink($item, 'index.php?option=com_attributes');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_definitions')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maDefinitions']);
		SmartyMenu::setItemTitle($item, 'maDefinitions');
		SmartyMenu::setItemLink($item, 'index.php?option=com_definitions');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}
	
	if($pMain->checkPerm('edit_definitions')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maSpecialisations']);
		SmartyMenu::setItemTitle($item, 'maSpecialisations');
		SmartyMenu::setItemLink($item, 'index.php?option=com_specialisations');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_genders')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maGenders']);
		SmartyMenu::setItemTitle($item, 'maGenders');
		SmartyMenu::setItemLink($item, 'index.php?option=com_genders');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_roles')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maRoles']);
		SmartyMenu::setItemTitle($item, 'maRoles');
		SmartyMenu::setItemLink($item, 'index.php?option=com_roles');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_guilds')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maGuilds']);
		SmartyMenu::setItemTitle($item, 'maGuilds');
		SmartyMenu::setItemLink($item, 'index.php?option=com_guilds');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_raids_any')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mpRaids']);
		SmartyMenu::setItemTitle($item, 'mpRaids');
		SmartyMenu::setItemLink($item, 'index.php?option=com_raids');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	if($pMain->checkPerm('edit_raid_templates')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['maRaid_templates']);
		SmartyMenu::setItemTitle($item, 'maRaid_templates');
		SmartyMenu::setItemLink($item, 'index.php?option=com_templates');
		SmartyMenu::addMenuItem($administer_sub, $item);
	}

	// CREATE SUBMENU
    SmartyMenu::initMenu($create_sub);

	if($pMain->checkPerm('edit_announcements_own') || $pMain->checkPerm('edit_announcements_any')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mcAnnouncement']);
		SmartyMenu::setItemTitle($item, 'mcAnnouncement');
		SmartyMenu::setItemLink($item, 'index.php?option=com_announcements&task=new');
		SmartyMenu::addMenuItem($create_sub, $item);
	}

	if($pMain->checkPerm('edit_characters_own') || $pMain->checkPerm('edit_characters_any')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mcCharacter']);
		SmartyMenu::setItemTitle($item, 'mcCharacter');
		SmartyMenu::setItemLink($item, 'index.php?option=com_characters&task=new');
		SmartyMenu::addMenuItem($create_sub, $item);
	}

	if($pMain->checkPerm('edit_raids_own') || $pMain->checkPerm('edit_raids_any')) {
		SmartyMenu::initItem($item);
		SmartyMenu::setItemText($item, $pLang['mcRaid']);
		SmartyMenu::setItemTitle($item, 'mcRaid');
		SmartyMenu::setItemLink($item, 'index.php?option=com_raids&task=new');
		SmartyMenu::addMenuItem($create_sub, $item);
	}

    // Now we create the top-level menu
    SmartyMenu::initMenu($menu);

	// setup login information as a menu (first place in array)
	// SmartyMenu::initItem($item);
    // SmartyMenu::setItemText($item, $user_name);
	// SmartyMenu::setItemTitle($item, 'mUser');
    // SmartyMenu::setItemLink($item, $user_logout);
	// SmartyMenu::setItemAvatar($item, $url_avatar);	
    // SmartyMenu::addMenuItem($menu, $item);
		
    // create and add Home menu which is not manage with externals links menu to avoid to delete it
    SmartyMenu::initItem($item);
    SmartyMenu::setItemText($item, $pLang['mHome']);
	SmartyMenu::setItemTitle($item, 'mHome');
    SmartyMenu::setItemLink($item, 'index.php'); 
    SmartyMenu::addMenuItem($menu, $item);
	
	if($pMain->checkPerm('view_history_own') || $pMain->checkPerm('edit_announcements_own') ||
	$pMain->checkPerm('edit_characters_own') || $pMain->checkPerm('edit_subscriptions_own') ||
	$pMain->checkPerm('edit_raids_own')) {
		SmartyMenu::initItem($item);
		//SmartyMenu::setItemText($item, '<i class="material-icons md-18">person</i> '.$pLang['mProfile']);
		SmartyMenu::setItemText($item, $pLang['mProfile']);
		SmartyMenu::setItemIcon($item, 'person');
		SmartyMenu::setItemTitle($item, 'mProfile');
		SmartyMenu::setItemSubmenu($item, $profile_sub);
		SmartyMenu::addMenuItem($menu, $item);
	}
	
	if($pMain->checkPerm('view_roster') || $pMain->checkPerm('view_members')) {
		SmartyMenu::initItem($item);
		//SmartyMenu::setItemText($item, '<i class="material-icons md-18">group</i> '.$pLang['mRoster']);
		SmartyMenu::setItemText($item, $pLang['mRoster']);
		SmartyMenu::setItemIcon($item, 'group');
		SmartyMenu::setItemTitle($item, 'mRoster');
		SmartyMenu::setItemSubmenu($item, $roster_sub);
		SmartyMenu::addMenuItem($menu, $item);
	}
	
	if($pMain->checkPerm('edit_characters_any') || $pMain->checkPerm('edit_characters_own') ||
	$pMain->checkPerm('edit_announcements_any') || $pMain->checkPerm('edit_announcements_own') ||
	$pMain->checkPerm('edit_raids_any') || $pMain->checkPerm('edit_raids_own')) {
		SmartyMenu::initItem($item);
		//SmartyMenu::setItemText($item, '<i class="material-icons md-18">library_add</i> '.$pLang['mCreate']);
		SmartyMenu::setItemText($item, $pLang['mCreate']);
		SmartyMenu::setItemIcon($item, 'library_add');
		SmartyMenu::setItemTitle($item, 'mCreate');
		SmartyMenu::setItemSubmenu($item, $create_sub);
		SmartyMenu::addMenuItem($menu, $item);
	}
	
	if($pMain->checkPerm('allow_backups') || $pMain->checkPerm('edit_configuration') ||
	$pMain->checkPerm('edit_attributes') || $pMain->checkPerm('edit_definitions') ||
	$pMain->checkPerm('edit_genders') || $pMain->checkPerm('edit_guilds') ||
	$pMain->checkPerm('edit_groups') || $pMain->checkPerm('edit_permissions') ||
	$pMain->checkPerm('edit_races') || $pMain->checkPerm('edit_roles') ||
	$pMain->checkPerm('edit_raid_templates')) {
		SmartyMenu::initItem($item);
		//SmartyMenu::setItemText($item,'<i class="material-icons md-18">settings</i> '.$pLang['mAdmin']);
		SmartyMenu::setItemText($item, $pLang['mAdmin']);
		SmartyMenu::setItemIcon($item, 'settings');
		SmartyMenu::setItemTitle($item, 'mAdmin');
		SmartyMenu::setItemSubmenu($item, $administer_sub);
		SmartyMenu::addMenuItem($menu, $item);
	}
	
	if($pMain->getLogged()) {
		SmartyMenu::initItem($item);
		//SmartyMenu::setItemText($item, '<i class="material-icons md-18">rss_feed</i>');
		SmartyMenu::setItemText($item, '');
		SmartyMenu::setItemIcon($item, 'rss_feed');
		SmartyMenu::setItemTitle($item, 'mRss');
		SmartyMenu::setItemLink($item, 'index.php?option=com_rss'); 
		SmartyMenu::addMenuItem($menu, $item);
	}

$p->assign('menu', $menu);
?>