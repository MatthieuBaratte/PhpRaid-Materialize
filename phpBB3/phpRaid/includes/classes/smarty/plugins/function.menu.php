<?php

//------------------------------------------------------------------------------
//  SmartyMenu version 1.1                       
//  http://www.phpinsider.com/php/code/SmartyMenu/                           
//                                                                               
//  SmartyMenu is an implementation of the Suckerfish Dropdowns
//  by Patrick Griffiths and Dan Webb.
//  http://htmldog.com/articles/suckerfish/dropdowns/
//
//  Copyright(c) 2004-2005 New Digital Group, Inc.. All rights reserved.                                 
//                                                                               
//  This library is free software; you can redistribute it and/or modify it      
//  under the terms of the GNU Lesser General Public License as published by     
//  the Free Software Foundation; either version 2.1 of the License, or (at      
//  your option) any later version.                                              
//                                                                               
//  This library is distributed in the hope that it will be useful, but WITHOUT  
//  ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or        
//  FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public         
//  License for more details.                                                    
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
// Modified by: Matthieu Baratte
// Description: custom smarty menu using materializedcss
//------------------------------------------------------------------------------

// number of chars to indent unordered list level
define('SMARTYMENU_INDENT', 3);

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     function
 * Name:     smarty_function_menu
 * Purpose:  generate menu
 * -------------------------------------------------------------
 */
function smarty_function_menu($params, &$smarty)
{
    if(empty($params['data'])) {
        $smarty->trigger_error("menu_init: missing 'data' parameter");
        return false;
    }
		
	// Get Db & session info
	global $db_raid;
	global $pMain;
	global $pLang;
	global $pConfig;
	
	// ----------
	// Build external links list for top left menu
	// ----------
	// Get external links
	unset($sql);
	$sql['SELECT'] = "*";
	$sql['FROM'] = "external_links";
	//$sql['WHERE'] = ' type=""';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	
	// set external links list
	$extlink_list = '<li><a class="color-link--menu" href="'.htmlspecialchars($params['data'][0]['link']).'"><i class="material-icons left">home</i> '.strtoupper($params['data'][0]['text']).'</a></li>';
	while($extlink_data = $db_raid->fetch()) {
		if (empty($extlink_data['icon_mdl'])) {
			$extlink_icon = '';
		} else {
			$extlink_icon = '<i class="material-icons left">'.$extlink_data['icon_mdl'].'</i>';
		}
		$extlink_title = strtoupper($extlink_data['title']);
		$extlink_url = $extlink_data['url'];
		$extlink_list .= '<li><a class="color-link--menu" href="'.$extlink_url.'">'.$extlink_icon.' '.$extlink_title.'</a></li>';
	}

	// Set banner responsiv img
	$banner_resp = $pConfig['site_url'].'/templates/'.$pConfig['template'].'/images/banners/legion-resp.jpg';

	// ----------
	// Build user profil block for top right menu
	// ----------
	// Set avatar icon path
	$avatar_path = $pConfig['site_url'].'games/'.$pConfig['game'].'/images/avatars/';
	// Get user profil information
	unset($sql);
	$sql["SELECT"] = "*";
	$sql["FROM"] = "profile";
	$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	// Set user avatar
	$profil_data = $db_raid->fetch();
	if (empty($profil_data['icon_avatar'])) {
		$profil_avatarUrl = $avatar_path.'a_default.png';
	} else {
		$profil_avatarUrl = $avatar_path.$profil_data['icon_avatar'];
	}
	// Set user avatar css
	if (substr($profil_data['icon_avatar'],0,6) != 'class_') {
		$posExt = strpos($profil_data['icon_avatar'],'.');
		$profil_avatarClass = "img--".substr($profil_data['icon_avatar'],0,$posExt);
	} else {
		$posExt = strpos($profil_data['icon_avatar'],'.');
		$profil_avatarClass = "img--".substr($profil_data['icon_avatar'],0,$posExt);
	}
	// set user informlation and login/logout
	if($pMain->getLogged()) {
		$profil_userName = $pMain->getUser();
		//$profil_logout = 'index.php?option=com_login&amp;task=logout';
		$profil_logout = '<a href="index.php?option=com_login&amp;task=logout" class="btn-floating btn-chip waves-effect waves-light green right"><i class="material-icons">power_settings_new</i></a>';
	} else {
		$profil_userName = '<a href="index.php?option=com_password">Mot de passe perdu ?</a>';
		//$profil_logout = 'index.php?option=com_login&amp;task=login';
		$profil_logout = '<a href="index.php?option=com_login&amp;task=login" class="btn-floating btn-chip waves-effect waves-light red right"><i class="material-icons">power_settings_new</i></a>';
	}

	// ----------
	// MAIN - Build Menu
	// ----------
	$_output .= '<header>';
	// Build responsiv menu
	$_output .= '<ul class="side-nav color-bg-popup" id="nav-mobile">';			
		$_output .= '<div class="side-nav-div color-bg-menu">';
			$_output .= '<div class="title color-bg-popup color-br-menu">PHP RAIDER</div>';
			$_output .= '<div class="banner color-br-menu">';
			$_output .= '<img class="guild-logo" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/images/guild/guild_logo.png">';
			$_output .= '</div>';
			$_output .= '<div class="chip color-bg-chip color-chip color-br-menu">';
				$_output .= '<div class="chip-avatar color-br-menu">';
				$_output .= '<img class="'.$profil_avatarClass.'" src="'.$profil_avatarUrl.'" alt="Avatar">';
				$_output .= '</div>';
				$_output .= $profil_userName;
				//$_output .= '<a href="'.$profil_logout.'"class="btn-floating btn-chip waves-effect waves-light red right"><i class="material-icons">power_settings_new</i></a>';
				$_output .= $profil_logout;
			$_output .= '</div>';
			$_output .= $extlink_list;
			$_output .= '<li class="divider"></li>';
			$_output .= '<ul class="collapsible" data-collapsible="accordion">';
			foreach($params['data'] as $_element) {
				$_output .= "\n";
				if ($_element['title'] != 'mHome') {
					$_output .= smarty_function_menu_render_elementResp($_element, 1); 
				}
				$_output .= "\n";		
			}
			$_output .= '</ul>';
		$_output .= '</div>';;
	$_output .= '</ul>';
	// Build menu
	$_output .= '<div class="navbar-fixed">';
	$_output .= '<nav class="nav-extended color-main">';
		$_output .= '<div class="nav-wrapper color-bg-menu color-br-menu" id="menutop">';
		$_output .= '<ul class="hide-on-med-and-down left">';
		$_output .= $extlink_list;
		$_output .= '</ul>';
	// Build profil block
			$_output .= '<div class="chip right hide-on-med-and-down color-bg-chip color-chip">';
				$_output .= '<div class="chip-avatar color-br-menu">';
				$_output .= '<img class="'.$profil_avatarClass.'" src="'.$profil_avatarUrl.'" alt="Avatar">';
				$_output .= '</div>';
				$_output .= $profil_userName;
				//$_output .= '<a href="'.$profil_logout.'"class="btn-floating btn-chip waves-effect waves-light red right"><i class="material-icons">power_settings_new</i></a>';
				$_output .= $profil_logout;
			$_output .= '</div>';
			// Menu bar for responsiv design
			$_output .= '<div class="nav-resp-bg color-bg-popup show-on-medium-and-down hide-on-med-and-up z-depth-4">';
			$_output .= '<div class="nav-resp-icon right"><i class="material-icons">event</i></div>';
			$_output .= '</div>';
			$_output .= '<a href="#!" data-activates="nav-mobile" class="button-collapse color-link--menu"><i class="material-icons">menu</i></a>';
			$_output .= '<img class="guild-logo-mini show-on-medium-and-down hide-on-med-and-up" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/images/guild/guild_logo.png">';
	// Build menu
		$_output .= '</div>';
		$_output .= '<div class="nav-wrapper hide-on-med-and-down color-bg-menu color-br-menu z-depth-4" id="menubottom">';
			$_output .= '<ul class="left">';
							foreach($params['data'] as $_element) {
								$_output .= "\n"; 	
								if ($_element['title'] != 'mHome') {
									$_output .= smarty_function_menu_render_element($_element, 1); 
								}
								$_output .= "\n";		
							}
			$_output .= '</ul>';
		$_output .= '</div>';
	$_output .= '</nav>';  
	$_output .= '</div>';
	// Build banner under the menu
	$_output .= '<div class="banner hide-on-med-and-down color-br-menu z-depth-4">';
		$_output .= '<div class="banner-title">PHP Raider</div>';
		$_output .= '<img class="guild-logo" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/images/guild/guild_logo.png">';
	$_output .= '</div>';
	$_output .= '<div class="banner-mini show-on-medium-and-down hide-on-med-and-up color-br-menu z-depth-4">';
	$_output .= '</div>';
	$_output .= '</header>';
	$_output .= '<main>';

    return $_output;
}

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     function
 * Name:     smarty_function_menu_render_element
 * Purpose:  generate menu element
 * -------------------------------------------------------------
 */
function smarty_function_menu_render_element($element,$level) {
	
    $_output = '';
	
	if ($level == 1) {
		if ($element['title'] != 'mRss') {
			$_text .= '<li class="color-br-menu color-hv-link--menu-drop">';
			$_text .= '<a class="dropdown-button color-link--menu" href="#!" data-activates="'.$element['title'].'" data-beloworigin="true">';
			$_text .= '<i class="material-icons left">'.$element['icon'].'</i>'.$element['text'].' <i class="material-icons right">arrow_drop_down</i>';
			$_text .= '</a>';
			$_text .= '</li>';
			$_text .= "\n";
			$_text .= str_repeat(' ', $level * SMARTYMENU_INDENT).'<ul class="dropdown-content color-bg-popup" id="'.$element['title'].'">';
		} else {
			$_text .='<li class="color-br-menu color-hv-link--menu-drop">';
			$_text .='<a class="color-link--menu" href="'.htmlspecialchars($element['link']).'">';
			$_text .='<i class="material-icons left">'.$element['icon'].'</i>'.$element['text'];
			$_text .='</a>';
			$_text .='</li>';
		}
	} else {
		$_text .='<li class="color-br-menu color-hv-link--menu">';
		$_text .='<a class="color-link--menu" href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a>';
		$_text .='</li>';
		if ($element['title'] == 'mpUpdate' or $element['title'] == 'mpCharacters' or $element['title'] == 'maLinks' or $element['title'] == 'maGroups' or $element['title'] == 'maGuilds') {
			$_text .= '<li class="divider"></li>';
		}
	}
	
    if(isset($element['submenu'])) {
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";
		
        foreach($element['submenu'] as $_submenu) {
            $_output .=  smarty_function_menu_render_element($_submenu, $level + 1);
		}
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).'</ul>';
    } else {        
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";        
    }

    return $_output;
}

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     function
 * Name:     smarty_function_menu_render_elementResp
 * Purpose:  generate menu element for responsiv design
 * -------------------------------------------------------------
 */
function smarty_function_menu_render_elementResp($element,$level) {
	    
    $_output = '';
	
	if ($level == 1) {
		if ($element['title'] != 'mRss') {
			$_text .= '<li class="color-br-menu">';
			$_text .= '<a class="collapsible-header color-link--menu" id="Resp'.$element['title'].'">';
			$_text .= '<i class="material-icons left">'.$element['icon'].'</i>'.$element['text'].' <i class="material-icons right" id="iResp'.$element['title'].'">arrow_drop_down</i>';
			$_text .= '</a>';
			$_text .= '<div class="collapsible-body">';
			$_text .= '<ul>';
		} else {
			$_text .='<li class="color-br-menu">';
			$_text .='<a class="color-link--menu" href="'.htmlspecialchars($element['link']).'">';
			$_text .='<i class="material-icons left">'.$element['icon'].'</i>'.$element['text']. ' Rss';
			$_text .='</a>';
			$_text .='</li>';
		}
	} else {
		$_text .='<li class="color-br-menu color-hv-menu--link">';
		$_text .='<a class="color-link--menu" href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a>';
		$_text .='</li>';
	}
	
    if(isset($element['submenu'])) {
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";
		
        foreach($element['submenu'] as $_submenu) {
            $_output .=  smarty_function_menu_render_elementResp($_submenu, $level + 1);
		}
		//$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).'</ul>';
		$_output .= '</ul>';
		$_output .= '</div>';
		$_output .= '</li>';
    } else {        
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";        
    }

    return $_output;
}

/* vim: set expandtab: */

?>
