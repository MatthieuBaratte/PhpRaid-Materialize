<?php /* Smarty version 2.6.26, created on 2017-12-21 12:05:28
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/configuration.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/configuration.tpl', 19, false),array('modifier', 'escape', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/configuration.tpl', 31, false),)), $this); ?>
<div class="container" id="containerConfiguration">	
	<form method="post" action="index.php?option=com_configuration">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				<?php echo $this->_tpl_vars['game_header']; ?>

			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="gaGame_text" name="pConfig_game"><?php echo $this->_tpl_vars['games']; ?>
</select>
						<label for="gaGame_text" class="color-theme"><?php echo $this->_tpl_vars['gaGame_text']; ?>
</label>
					</div>
					<div class="col s12 m2">
						<a class="btn color-btn-theme waves-effect waves-light" href=<?php echo $this->_tpl_vars['installGame_text']; ?>
><i class="material-icons">file_upload</i> <i class="material-icons">fiber_new</i></a>
					</div>
				</div>
				</br>

				<?php echo smarty_function_validate(array('id' => 'min_level','message' => ($this->_tpl_vars['minLevelError']),'assign' => 'errorMinLevel'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'max_level','message' => ($this->_tpl_vars['maxLevelError']),'assign' => 'errorMaxLevel'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'min_raiders','message' => ($this->_tpl_vars['minRaidersError']),'assign' => 'errorMinRaiders'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'max_raiders','message' => ($this->_tpl_vars['maxRaidersError']),'assign' => 'errorMaxRaiders'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'date_format','message' => ($this->_tpl_vars['dateError']),'assign' => 'errorDate'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'time_format','message' => ($this->_tpl_vars['timeError']),'assign' => 'errorTime'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'admin','message' => ($this->_tpl_vars['adminError']),'assign' => 'errorAdmin'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'admin_email','message' => ($this->_tpl_vars['adminEmailError']),'assign' => 'errorAdminEmail'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'report_max','message' => ($this->_tpl_vars['reportError']),'assign' => 'errorReport'), $this);?>


				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_min_level'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="gaMinLvl_text" name="pConfig_min_level" class="validate <?php if (isset ( $this->_tpl_vars['errorMinLevel'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMinLevel'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="gaMinLvl_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMinLevel'] )): ?><?php echo $this->_tpl_vars['minLevelError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['gaMinLvl_text']; ?>
</label>	
					</div>
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_max_level'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="gaMaxLvl_text" name="pConfig_max_level" class="validate <?php if (isset ( $this->_tpl_vars['errorMaxLevel'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMaxLevel'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="gaMaxLvl_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMaxLevel'] )): ?><?php echo $this->_tpl_vars['maxLevelError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['gaMaxLvl_text']; ?>
</label>	
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_min_raiders'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="gaMinRaiders_text" name="pConfig_min_raiders" class="validate <?php if (isset ( $this->_tpl_vars['errorMinRaiders'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMinRaiders'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="gaMinRaiders_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMinRaiders'] )): ?><?php echo $this->_tpl_vars['minRaidersError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['gaMinRaiders_text']; ?>
</label>	
					</div>
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_max_raiders'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="gaMaxRaiders_text" name="pConfig_max_raiders" class="validate <?php if (isset ( $this->_tpl_vars['errorMaxRaiders'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMaxRaiders'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="gaMaxRaiders_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMaxRaiders'] )): ?><?php echo $this->_tpl_vars['maxRaidersError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['gaMaxRaiders_text']; ?>
</label>	
					</div>
				</div>
			</div>
			<div class="panel-header center-align color-bg-header color-theme">
				<?php echo $this->_tpl_vars['site_header']; ?>

			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="siLanguage_text" name="pConfig_language"><?php echo $this->_tpl_vars['language']; ?>
</select>
						<label for="siLanguage_text" class="color-theme"><?php echo $this->_tpl_vars['siLanguage_text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="siTemplate_text" name="pConfig_template"><?php echo $this->_tpl_vars['templates']; ?>
</select>
						<label for="siTemplate_text" class="color-theme"><?php echo $this->_tpl_vars['siTemplate_text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="siFirstDayOfWeek_text" name="pConfig_first_day_of_week"><?php echo $this->_tpl_vars['firstdayofweek']; ?>
</select>
						<label for="siFirstDayOfWeek_text" class="color-theme"><?php echo $this->_tpl_vars['siFirstDayOfWeek_text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_date_format'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="siDateFormat_text" name="pConfig_date_format" class="validate <?php if (isset ( $this->_tpl_vars['errorDate'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorDate'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="siDateFormat_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorDate'] )): ?><?php echo $this->_tpl_vars['dateError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['siDateFormat_text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_time_format'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="siTimeFormat_text" name="pConfig_time_format" class="validate <?php if (isset ( $this->_tpl_vars['errorTime'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorTime'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="siTimeFormat_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorTime'] )): ?><?php echo $this->_tpl_vars['timeError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['siTimeFormat_text']; ?>
</label>
					</div>
					<div class="input-field col s9 m4">
						<select id="siTimezone_text" name="pConfig_timezone"><?php echo $this->_tpl_vars['timezone']; ?>
</select>
						<label for="siTimezone_text" class="color-theme"><?php echo $this->_tpl_vars['siTimezone_text']; ?>
</label>
					</div>
					<div class="input-field col s3 m2">
						<label><?php echo $this->_tpl_vars['siCurrentTime']; ?>
 GT</label>
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="100" id="siDst_text" name="pConfig_dst" class="filled-in" <?php if ($this->_tpl_vars['pConfig_dst']): ?>checked="checked"<?php endif; ?>/>
						<label for="siDst_text" class="color-theme"><?php echo $this->_tpl_vars['siDst_text']; ?>
</label>	
						<label for="siDst_text"> [<?php echo $this->_tpl_vars['siSetTime']; ?>
 <?php echo $this->_tpl_vars['siLocalText']; ?>
]</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_admin_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="siAdmin_text" name="pConfig_admin_name" class="validate <?php if (isset ( $this->_tpl_vars['errorAdmin'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorAdmin'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="siAdmin_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorAdmin'] )): ?><?php echo $this->_tpl_vars['adminError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['siAdmin_text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_admin_email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="siAdminEmail_text" name="pConfig_admin_email" class="validate <?php if (isset ( $this->_tpl_vars['errorAdminEmail'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorAdminEmail'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="siAdminEmail_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorAdminEmail'] )): ?><?php echo $this->_tpl_vars['adminEmailError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['siAdminEmail_text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['siURL_text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="siURL_text" name="pConfig_site_url">
						<label for="siURL_text" class="color-theme"><?php echo $this->_tpl_vars['siAdminEmail_text']; ?>
</label>
					</div>
				</div>
			</div>
			<div class="panel-header center-align color-bg-header color-theme">
				<?php echo $this->_tpl_vars['misc_header']; ?>

			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="miDefaultGroup_text" name="pConfig_default_group"><?php echo $this->_tpl_vars['group']; ?>
</select>
						<label for="miDefaultGroup_text" class="color-theme"><?php echo $this->_tpl_vars['miDefaultGroup_text']; ?>
</label>
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miAnon_text" name="pConfig_allow_anonymous" class="filled-in" <?php if ($this->_tpl_vars['pConfig_allow_anonymous']): ?>checked="checked"<?php endif; ?>/>
						<label for="miAnon_text" class="color-theme"><?php echo $this->_tpl_vars['miAnon_text']; ?>
</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miQueue_text" name="pConfig_auto_queue" class="filled-in" <?php if ($this->_tpl_vars['pConfig_auto_queue']): ?>checked="checked"<?php endif; ?>/>
						<label for="miQueue_text" class="color-theme"><?php echo $this->_tpl_vars['miQueue_text']; ?>
</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miDebug_text" name="pConfig_debug_mode" class="filled-in" <?php if ($this->_tpl_vars['pConfig_debug_mode']): ?>checked="checked"<?php endif; ?>/>
						<label for="miDebug_text" class="color-theme"><?php echo $this->_tpl_vars['miDebug_text']; ?>
</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miDisable_text" name="pConfig_disable_site" class="filled-in" <?php if ($this->_tpl_vars['pConfig_disable_site']): ?>checked="checked"<?php endif; ?>/>
						<label for="miDisable_text" class="color-theme"><?php echo $this->_tpl_vars['miDisable_text']; ?>
</label>	
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pConfig_report_max'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="miReport_text" name="pConfig_report_max" class="validate <?php if (isset ( $this->_tpl_vars['errorReport'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorReport'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="miReport_text" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorReport'] )): ?><?php echo $this->_tpl_vars['reportError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['miReport_text']; ?>
</label>
					</div>
				</div>
			</div>
			<div class="panel-footer center-align color-bg-footer">
				<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="<?php echo $this->_tpl_vars['submit']; ?>
"><?php echo $this->_tpl_vars['submit']; ?>
<i class="material-icons right">send</i></button>
				<button type="reset" class="btn color-btn-theme waves-effect waves-light" value="<?php echo $this->_tpl_vars['reset']; ?>
"><?php echo $this->_tpl_vars['reset']; ?>
<i class="material-icons right">replay</i></button>
			</div>
		</div>	
	</form>
</div>