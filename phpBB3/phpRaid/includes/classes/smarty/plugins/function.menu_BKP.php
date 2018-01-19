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

// number of chars to indent unordered list level
define('SMARTYMENU_INDENT', 3);

function smarty_function_menu_render_element($element,$level) {
	
    
    $_output = '';
	
	if ($level == 1) {
		if ($element['title'] != 'mRss') {
			$_text .='<div class="nav-item dropdown">';
			$_text .='<a class="dropdown-toggle" href="#" id="dropdownMonCompte" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$element['text'].'</a>';
			$_text .='<div class="dropdown-menu div-shadow" aria-labelledby="dropdownMonCompte">';
		} else {
			$_text .='<div class="nav-item">';
			$_text .='<a href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a>';
			$_text .='<div>';
		}
	} else {
		$_text .='<a class="nav-link dropdown-item" href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a>';
		if ($element['title'] == 'mpUpdate' or $element['title'] == 'mpCharacters' or $element['title'] == 'maLinks' or $element['title'] == 'mpAnnouncements' or $element['title'] == 'maGenders' or $element['title'] == 'maPermissions' or $element['title'] == 'mpRaids' or	$element['title'] == 'maRoles' or $element['title'] == 'maRaid_templates') {
			$_text .= '<div class="dropdown-divider"></div>';
		}
	}
	
    if(isset($element['submenu'])) {
    
        $_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";
        $_output .= str_repeat(' ', $level * SMARTYMENU_INDENT)."\n";

        foreach($element['submenu'] as $_submenu) {
            $_output .=  smarty_function_menu_render_element($_submenu, $level + 1);
        }

    } else {        
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";        
    }
		
    return $_output;
}

function smarty_function_menu_render_elementResp($element,$level) {
	    
    $_output = '';
	
	if ($level == 1) {
		if ($element['title'] != 'mRss') {
			$_text .= '<div class="card">';
			$_text .= '<div role="tab" id="heading'.$element['title'].'">';
			$_text .= '<a class="nav-item" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse'.$element['title'].'" aria-controls="collapse'.$element['title'].'" data-md="md'.$element['title'].'">'.$element['text'].' <i class="material-icons md-expand" id="md'.$element['title'].'">expand_more</i></a>';
			$_text .= '</div>';
			$_text .= '<div class="collapse" id="collapse'.$element['title'].'" role="tabpanel" aria-labelledby="heading'.$element['title'].'">';
		} else {
			$_text .= '<div class="card">';
			$_text .='<a class="nav-item" href="'.htmlspecialchars($element['link']).'">'.$element['text'].' Rss</a>';
			$_text .='<div>';
		}
	} else {
		$_text = '<a class="nav-link" href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a>';
	}
	
    if(isset($element['submenu'])) {
    
        $_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";
        $_output .= str_repeat(' ', $level * SMARTYMENU_INDENT)."\n";

        foreach($element['submenu'] as $_submenu) {
            $_output .=  smarty_function_menu_render_elementResp($_submenu, $level + 1);
        }
    } else { 
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";        
    }
	
    return $_output;
}

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * Type:     function
 * Name:     menu
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
	// Get configuration information
	unset($sql);
	$sql['SELECT'] = "*";
	$sql['FROM'] = "config";
	//$sql['WHERE'] = ' name="game"';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($data = $db_raid->fetch()) {
		$pConfigInfo[$data['name']] = $data['value'];
	}
	$url_avatar = $pConfigInfo['site_url'].'games/'.$pConfigInfo['game'].'/images/avatars/';
	// Get login information
	unset($sql);
	$sql["SELECT"] = "*";
	$sql["FROM"] = "profile";
	$sql["WHERE"] = "profile_id = ".$pMain->getProfileID();
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	$avatar = $db_raid->fetch();
	if (empty($avatar['icon_avatar'])) {
		$url_avatar = $url_avatar.'a_default.png';
	} else {
		$url_avatar = $url_avatar.$avatar['icon_avatar'];
	}
		
	if($pMain->getLogged()) {
		$user_name = $pMain->getUser();
		$user_logout = 'index.php?option=com_login&amp;task=logout';
	} else {
		$user_name = '<a class="nav-chip--lostpwd" href="index.php?option=com_password">Mot de passe perdu ?</a>';
		$user_logout = 'index.php?option=com_login&amp;task=login';
	}
	// Set class for class_icon
	if (substr($avatar['icon_avatar'],0,6) != 'class_') {
		$class_icon = "";
		$class_icon_bg = "";
	} else {
		$class_icon_bg = " img--class-icon";
		$posExt = strpos($avatar['icon_avatar'],'.');
		$class_icon = " img--".substr($avatar['icon_avatar'],0,$posExt);
	}
		
	$_output = "\n";
		
	$_output .= '<div class="modal fade" id="modal--menu" tabindex="-1" role="dialog" aria-labelledby="modalLabel--menu" aria-hidden="true">';
	$_output .= '<div class="modal-dialog modal-sm modal-resp-dialog" role="document">';
	$_output .= '<div class="modal-content modal-resp-content">';
		
	$_output .= '<div class="modal-header modal-resp-header">';
	$_output .= '<div class="modal-title--center">';
	$_output .= '<h4 class="modal-title" id="mymodallabel">PHP RAIDER</h4>';
	$_output .= '</div>';
	$_output .= '<div class="modal-close">';
	$_output .= '<button type="button" class="close resp-btn-close" data-dismiss="modal" aria-label="close">';
	$_output .= '<span aria-hidden="true"><i class="material-icons md-16">close</i></span>';
	$_output .= '</button>';
	$_output .= '</div>';
	$_output .= '</div>';
	$_output .= '<div class="modal-body modal-resp-body">';
	
	$_output .= '<div class="div--banner-resp">';
	$_output .= '<img class="img-fluid img--guild-logo" src="'.$pConfigInfo['site_url'].'/templates/'.$pConfigInfo['template'].'/images/guild/guild_logo.png">';
	$_output .= "</div>\n";
	
	$_output .= '<div class="menuResp nav-chip">';
	$_output .= '<div class="nav-chip--contact">';
	$_output .= '<div class="nav-chip--contact-img-bg'.$class_icon_bg.'">&nbsp;</div>';
	$_output .= '<img class="nav-chip--contact-img'.$class_icon.'" src="'.$url_avatar.'">';
	$_output .= '<div class="nav-chip--text">'.$user_name.'</div>';
	$_output .= '<a href="'.$user_logout.'" class="nav-chip--action nav-chip--link"><i class="material-icons md-24">power_settings_new</i></a>';
	$_output .= '</div>';
	$_output .= '</div>';	
	$_output .= '<div class="menuResp-divider nav-chip-divider"></div>';
	
	$_output .= '<nav class="nav flex-column menuResp">';
	$_output .= '<a class="nav-link" href="'.htmlspecialchars($params['data'][0]['link']).'"><i class="material-icons md-24">home</i> home</a>';
	// Get external link
	unset($sql);
	$sql['SELECT'] = "*";
	$sql['FROM'] = "external_links";
	//$sql['WHERE'] = ' type=""';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);

	while($dataextlink = $db_raid->fetch()) {
		if (empty($dataextlink['icon_mdl'])) {
			$extlink_icon = '';
		} else {
			$extlink_icon = '<i class="material-icons md-24">'.$dataextlink['icon_mdl'].'</i>';
		}
		$extlink_title = $dataextlink['title'];
		$extlink_url = $dataextlink['url'];
		$_output .= '<a class="nav-link" href="'.$extlink_url.'">'.$extlink_icon.' '.$extlink_title.'</a>';
	}
	//$_output .= '<a class="nav-link" href="http://'.$_SERVER['HTTP_HOST'].'/phpbb3/portal.php"><i class="material-icons md-24">view_quilt</i> portail</a>';
	//$_output .= '<a class="nav-link" href="http://'.$_SERVER['HTTP_HOST'].'/phpbb3/index.php"><i class="material-icons md-20">forum</i> forum</a>';
	$_output .= '</nav>';
	$_output .= '<div class="menuResp-divider"></div>';
	
	$_output .= '<div class="menuSubResp" id="accordionMenu" role="tablist" aria-multiselectable="true">';
	foreach($params['data'] as $_element) {
		$_output .= "\n"; 	

		if ($_element['title'] != 'mHome') {
			$_output .= smarty_function_menu_render_elementResp($_element, 1); 
			
			$_output .= '</div>';
			$_output .= '</div>';
		}
        
		$_output .= "\n";		
    }
	$_output .= '</div>';
	
	$_output .= '</div>';
	$_output .= '</div>';
	$_output .= '</div>';
	$_output .= '</div>';
	
	$_output .= '<div class="container-fluid hidden-lg-up"  id="menu-resp">';
	$_output .= '<nav class="navbar fixed-top navbar-resp">';
	$_output .= '<div class="nav-link">';
	$_output .= '<a data-toggle="modal" data-target="#modal--menu" data-poload="menu"><i class="material-icons md-30">menu</i></a>';
	$_output .= '</div>';
	$_output .= '<div class="nav-link ml-auto">';
	$_output .= '<i class="material-icons md-30">event</i>';
	$_output .= '</div>';
	$_output .= '</nav>';
	$_output .= '</div>';
	
	$_output .= '<div class="container-fluid hidden-lg-up">';
	$_output .= '<div class="fixed-top">';
	$_output .= '<img class="img-fluid img--guild-logo-resp" src="'.$pConfigInfo['site_url'].'/templates/'.$pConfigInfo['template'].'/images/guild/guild_logo_resp.png">';
	$_output .= '</div>';
	$_output .= '</div>';
	$_output .= '<div class="container-fluid hidden-lg-up">';
	$_output .= '<div class="div--banner-resp">';
	$_output .= "</div>\n";
	$_output .= '</div>';
	$_output .= "\n";
			
	$_output .= '<div class="container-fluid">';
	$_output .= '<div class="row">';
	//$_output .= '<div class="hidden-md-down offset-xl-1 col-xl-10">';
	$_output .= '<div class="hidden-md-down col-xl-12">';
	$_output .= '<div class="div-shadow">';
	
	$_output .= '<div class="menu-bar" id="menu-header">';
	$_output .= '<div class="nav menu">';
	$_output .= '<a class="nav-link" href="'.htmlspecialchars($params['data'][0]['link']).'"><i class="material-icons md-24">home</i> home</a>';
	// Get external link
	unset($sql);
	$sql['SELECT'] = "*";
	$sql['FROM'] = "external_links";
	//$sql['WHERE'] = ' type=""';
	$db_raid->set_query('select', $sql, __FILE__, __LINE__);
	while($dataextlink = $db_raid->fetch()) {
		if (empty($dataextlink['icon_mdl'])) {
			$extlink_icon = '';
		} else {
			$extlink_icon = '<i class="material-icons md-24">'.$dataextlink['icon_mdl'].'</i>';
		}
		$extlink_title = $dataextlink['title'];
		$extlink_url = $dataextlink['url'];
		$_output .= '<a class="nav-link" href="'.$extlink_url.'">'.$extlink_icon.' '.$extlink_title.'</a>';
	}
	//$_output .= '<a class="nav-link" href="http://'.$_SERVER['HTTP_HOST'].'/phpbb3/portal.php"><i class="material-icons md-24">view_quilt</i> portail</a>';
	//$_output .= '<a class="nav-link" href="http://'.$_SERVER['HTTP_HOST'].'/phpbb3/index.php"><i class="material-icons md-18">forum</i> forum</a>';
	$_output .= '<div class="nav-link nav-chip ml-auto">';
	$_output .= '<div class="nav-chip--contact">';
	$_output .= '<div class="nav-chip--contact-img-bg'.$class_icon_bg.'">&nbsp;</div>';
	$_output .= '<img class="nav-chip--contact-img'.$class_icon.'" src="'.$url_avatar.'">';
	$_output .= '<div class="nav-chip--text">'.$user_name.'</div>';
	$_output .= '<a href="'.$user_logout.'" class="nav-chip--action nav-chip--link"><i class="material-icons md-24">power_settings_new</i></a>';
	$_output .= '</div>';
	$_output .= '</div>';	
	$_output .= '</div>';
	$_output .= '</div>';
	$_output .= "\n";
	
	$_output .='<div class="menu-bar" id="menuSub-header">';
	$_output .='<div class="nav menuSub">';
	foreach($params['data'] as $_element) {
			$_output .= "\n"; 	
			
			if ($_element['title'] != 'mHome') {
				$_output .= smarty_function_menu_render_element($_element, 1); 
				
				$_output .= '</div>';
				$_output .= '</div>';
			}
			
			$_output .= "\n";		
		}
	$_output .= '</div>';
	$_output .= '</div>';
	$_output .= "\n";
	
	$_output .= '';
	$_output .= '<div class="div--banner">';
	$_output .= '<div class="banner--title">PHP Raider</div>';
	//$_output .= '<div class="banner--title"><i class="material-icons md-128">event</i></div>';
	$_output .= '<img class="img-fluid img--guild-logo" src="'.$pConfigInfo['site_url'].'/templates/'.$pConfigInfo['template'].'/images/guild/guild_logo.png">';
	$_output .= "</div>\n";
	$_output .= '';
			
	$_output .= "</div>\n";
	$_output .= "</div>\n";
	$_output .= "</div>\n";
	$_output .= "</div>\n";
	
	$_output .= "\n";

	global $pLang,$pConfig;

	$avatar_path .= RAIDER_GAME_PATH.'images'.DIRECTORY_SEPARATOR.'avatars'.DIRECTORY_SEPARATOR;


	$_output .= '<nav class="nav-extended">';
	$_output .= '<div class="nav-wrapper colorBg-light1">';
	$_output .= '<div class="chip right hide-on-med-and-down">';
	$_output .= '<img src="'.$url_avatar.'" alt="Contact Person">'.$user_name;
	$_output .= '<a href="'.$user_logout.'"class="btn-floating btn-chip waves-effect waves-light red right"><i class="material-icons">power_settings_new</i></a>';
	$_output .= '</div>';
	$_output .= '<a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>';
	$_output .= '<ul id="nav-mobile" class="hide-on-med-and-down left">';
	$_output .= '<li><a href="#!"><i class="material-icons left">home</i> HOME</a></li>';
	$_output .= '<li><a href="#!"><i class="material-icons left">forum</i> FORUM</a></li>';
	$_output .= '<li><a href="#!"><i class="material-icons left">view_quilt</i> PORTAIL</a></li>';
	$_output .= '</ul>';
	$_output .= '<ul class="side-nav" id="mobile-demo">';
	$_output .= '<img src="legion-resp.jpg" class="responsive-img">';
	$_output .= '<div class="chip">';
	$_output .= '<img src="priest.png" alt="Contact Person">';
	$_output .= 'Colossius';
	$_output .= '<a class="btn-floating btn-chip waves-effect waves-light red right"><i class="material-icons">power_settings_new</i></a>';
	$_output .= '</div>';
	$_output .= '<li><a href="#!" class="waves-effect waves-orange"><i class="material-icons left">home</i> HOME</a></li>';
	$_output .= '<li><a href="#!" class="waves-effect waves-orange"><i class="material-icons left">forum</i> FORUM</a></li>';
	$_output .= '<li><a href="#!" class="waves-effect waves-orange"><i class="material-icons left">view_quilt</i> PORTAIL</a></li>';
	$_output .= '<li class="divider"></li>';
	$_output .= '<li><a class="dropdown-button" href="#!" data-activates="dropdown2" data-beloworigin="true"><i class="material-icons left">settings</i> Administrer <i class="material-icons right">arrow_drop_down</i></a></li>';
	$_output .= '<ul class="dropdown-content" id="dropdown2">';
	$_output .= '<li><a href="#!">Configuration</a></li>';
	$_output .= '<li><a href="#!">D�finitions</a></li>';
	$_output .= '<li class="divider"></li>';
	$_output .= '<li><a href="#!">S�curit�</a></li>';
	$_output .= '</ul>';
	$_output .= '</ul>';
	$_output .= '</div>';
	$_output .= '<div class="nav-wrapper hide-on-med-and-down z-depth-4 colorBg-light1" id="submenu">';
	$_output .= '<ul id="nav-desktop" class="left">';
	foreach($params['data'] as $_element) {
		$_output .= "\n"; 	
		
		if ($_element['title'] != 'mHome') {
			$_output .= smarty_function_menu_render_element1($_element, 1); 
			//$_output .= str_repeat(' ', 1 * SMARTYMENU_INDENT).'</ul>';
		}
		$_output .= "\n";		
	}

	$_output .= '</ul>';
	
	$_output .= "\n";	
	$_output .= "\n";	
	$_output .= '<ul class="right hide-on-med-and-down">'."\n";
	$_output .= '<li><a class="dropdown-button" href="#!" data-activates="dropdown1" data-beloworigin="true"><i class="material-icons left">settings</i> Administrer <i class="material-icons right">arrow_drop_down</i></a></li>'."\n";
	$_output .= '<ul class="dropdown-content" id="dropdown1">'."\n";
	$_output .= '<li><a href="#!">Configuration</a></li>'."\n";
	$_output .= '<li><a href="#!">D�finitions</a></li>'."\n";
	$_output .= '<li class="divider"></li>'."\n";
	$_output .= '<li><a href="#!">S�curit�</a></li>'."\n";
	$_output .= '</ul>'."\n";
	$_output .= '</ul>'."\n";

	$_output .= '</div>';
	$_output .= '</nav>';  
	$_output .= '<div class="banner"></div>';
	

    return $_output;
}

function smarty_function_menu_render_element1($element,$level) {
	
    $_output = '';
	
	if ($level == 1) {
		if ($element['title'] != 'mRss') {
			$_text .= '<li><a class="dropdown-button" href="#!" data-activates="'.$element['title'].'" data-beloworigin="true">'.$element['text'].' <i class="material-icons right">arrow_drop_down</i></a></li>';
			$_text .= "\n";
			$_text .= str_repeat(' ', $level * SMARTYMENU_INDENT).'<ul class="dropdown-content" id="'.$element['title'].'">';
		} else {
			$_text .='<li><a href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a></li>';
		}
	} else {
		$_text .='<li><a href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a></li>';
		if ($element['title'] == 'mpUpdate' or $element['title'] == 'mpCharacters' or $element['title'] == 'maLinks' or $element['title'] == 'mpAnnouncements' or $element['title'] == 'maGenders' or $element['title'] == 'maPermissions' or $element['title'] == 'mpRaids' or	$element['title'] == 'maRoles' or $element['title'] == 'maRaid_templates') {
			$_text .= '<li class="divider"></li>';
		}
	}
	
    if(isset($element['submenu'])) {
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";
		
        foreach($element['submenu'] as $_submenu) {
            $_output .=  smarty_function_menu_render_element1($_submenu, $level + 1);
		}
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).'</ul>';
    } else {        
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";        
    }

    return $_output;
}

function smarty_function_menu_render_elementResp1($element,$level) {
	    
    $_output = '';
	
	if ($level == 1) {
		if ($element['title'] != 'mRss') {
			$_text .= '<div class="card">';
			$_text .= '<div role="tab" id="heading'.$element['title'].'">';
			$_text .= '<a class="nav-item" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse'.$element['title'].'" aria-controls="collapse'.$element['title'].'" data-md="md'.$element['title'].'">'.$element['text'].' <i class="material-icons md-expand" id="md'.$element['title'].'">expand_more</i></a>';
			$_text .= '</div>';
			$_text .= '<div class="collapse" id="collapse'.$element['title'].'" role="tabpanel" aria-labelledby="heading'.$element['title'].'">';
		} else {
			$_text .= '<div class="card">';
			$_text .='<a class="nav-item" href="'.htmlspecialchars($element['link']).'">'.$element['text'].' Rss</a>';
			$_text .='<div>';
		}
	} else {
		$_text = '<a class="nav-link" href="'.htmlspecialchars($element['link']).'">'.$element['text'].'</a>';
	}
	
    if(isset($element['submenu'])) {
    
        $_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";
        $_output .= str_repeat(' ', $level * SMARTYMENU_INDENT)."\n";

        foreach($element['submenu'] as $_submenu) {
            $_output .=  smarty_function_menu_render_elementResp($_submenu, $level + 1);
        }
    } else { 
		$_output .= str_repeat(' ', $level * SMARTYMENU_INDENT).$_text."\n";        
    }
	
    return $_output;
}

/* vim: set expandtab: */

?>
