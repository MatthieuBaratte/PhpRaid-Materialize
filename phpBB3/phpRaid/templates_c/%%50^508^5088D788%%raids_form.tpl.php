<?php /* Smarty version 2.6.26, created on 2017-10-18 10:48:04
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids_form.tpl', 8, false),array('modifier', 'escape', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids_form.tpl', 23, false),array('modifier', 'cat', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids_form.tpl', 29, false),)), $this); ?>
<div class="container" id="containerRaidsForm">	
	<form name="new_raid" method="post" action="index.php?option=com_raids&amp;task=<?php echo $this->_tpl_vars['task']; ?>
">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				<?php echo $this->_tpl_vars['generic_header']; ?>

			</div>
			<div class="panel-content color-br-panel">
				<?php echo smarty_function_validate(array('id' => 'location','message' => ($this->_tpl_vars['locationError']),'assign' => 'errorLocation'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'date','message' => ($this->_tpl_vars['dateError']),'assign' => 'errorDate'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'title','message' => ($this->_tpl_vars['titleError']),'assign' => 'errorTitle'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'description','message' => ($this->_tpl_vars['descriptionError']),'assign' => 'errorDescription'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'minimum_level','message' => ($this->_tpl_vars['minError']),'assign' => 'errorMin'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'maximum_level','message' => ($this->_tpl_vars['maxError']),'assign' => 'errorMax'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'maximum','message' => ($this->_tpl_vars['maximumError']),'assign' => 'errorMaximum'), $this);?>
 
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="templateText" name="raid_template" onchange="MM_jumpMenu('self',this,0)"><?php echo $this->_tpl_vars['templates']; ?>
</select>
						<label for="templateText" class="color-theme"><?php echo $this->_tpl_vars['templateText']; ?>
</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['location'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="locationText" name="location" class="validate <?php if (isset ( $this->_tpl_vars['errorLocation'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorLocation'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="locationText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorLocation'] )): ?><?php echo $this->_tpl_vars['locationError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['locationText']; ?>
</label>	
					</div>
				</div>
				<div class="row" id="date_root"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="date" name="date" class="datepicker <?php if (isset ( $this->_tpl_vars['errorDate'] )): ?><?php echo ((is_array($_tmp='validate ')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['classError']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['classError'])); ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorDate'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="date" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorDate'] )): ?><?php echo $this->_tpl_vars['dateError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['dateText']; ?>
</label>	
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m6">
						<select id="invite_time_hour" name="invite_time_hour">
							<option value="00" <?php if ($this->_tpl_vars['invite_time_hour'] == '00'): ?> selected<?php endif; ?>>00</option>
							<option value="01" <?php if ($this->_tpl_vars['invite_time_hour'] == '01'): ?> selected<?php endif; ?>>01</option>
							<option value="02" <?php if ($this->_tpl_vars['invite_time_hour'] == '02'): ?> selected<?php endif; ?>>02</option>
							<option value="03" <?php if ($this->_tpl_vars['invite_time_hour'] == '03'): ?> selected<?php endif; ?>>03</option>
							<option value="04" <?php if ($this->_tpl_vars['invite_time_hour'] == '04'): ?> selected<?php endif; ?>>04</option>
							<option value="05" <?php if ($this->_tpl_vars['invite_time_hour'] == '05'): ?> selected<?php endif; ?>>05</option>
							<option value="06" <?php if ($this->_tpl_vars['invite_time_hour'] == '06'): ?> selected<?php endif; ?>>06</option>
							<option value="07" <?php if ($this->_tpl_vars['invite_time_hour'] == '07'): ?> selected<?php endif; ?>>07</option>
							<option value="08" <?php if ($this->_tpl_vars['invite_time_hour'] == '08'): ?> selected<?php endif; ?>>08</option>
							<option value="09" <?php if ($this->_tpl_vars['invite_time_hour'] == '09'): ?> selected<?php endif; ?>>09</option>
							<option value="10" <?php if ($this->_tpl_vars['invite_time_hour'] == '10'): ?> selected<?php endif; ?>>10</option>
							<option value="11" <?php if ($this->_tpl_vars['invite_time_hour'] == '11'): ?> selected<?php endif; ?>>11</option>
							<option value="12" <?php if ($this->_tpl_vars['invite_time_hour'] == '12'): ?> selected<?php endif; ?>>12</option>
							<option value="13" <?php if ($this->_tpl_vars['invite_time_hour'] == '13'): ?> selected<?php endif; ?>>13</option>
							<option value="14" <?php if ($this->_tpl_vars['invite_time_hour'] == '14'): ?> selected<?php endif; ?>>14</option>
							<option value="15" <?php if ($this->_tpl_vars['invite_time_hour'] == '15'): ?> selected<?php endif; ?>>15</option>
							<option value="16" <?php if ($this->_tpl_vars['invite_time_hour'] == '16'): ?> selected<?php endif; ?>>16</option>
							<option value="17" <?php if ($this->_tpl_vars['invite_time_hour'] == '17'): ?> selected<?php endif; ?>>17</option>
							<option value="18" <?php if ($this->_tpl_vars['invite_time_hour'] == '18'): ?> selected<?php endif; ?>>18</option>
							<option value="19" <?php if ($this->_tpl_vars['invite_time_hour'] == '19'): ?> selected<?php endif; ?>>19</option>
							<option value="20" <?php if ($this->_tpl_vars['invite_time_hour'] == '20'): ?> selected<?php endif; ?>>20</option>
							<option value="21" <?php if ($this->_tpl_vars['invite_time_hour'] == '21'): ?> selected<?php endif; ?>>21</option>
							<option value="22" <?php if ($this->_tpl_vars['invite_time_hour'] == '22'): ?> selected<?php endif; ?>>22</option>
							<option value="23" <?php if ($this->_tpl_vars['invite_time_hour'] == '23'): ?> selected<?php endif; ?>>23</option>
						</select>
						<label for="invite_time_hour" class="color-theme"><?php echo $this->_tpl_vars['inviteHour']; ?>
</label>
					</div>
					<div class="input-field col s6 m6">
						<select id="invite_time_minute" name="invite_time_minute">
							<option value="00" <?php if ($this->_tpl_vars['invite_time_minute'] == '00'): ?> selected<?php endif; ?>>00</option>
							<option value="05" <?php if ($this->_tpl_vars['invite_time_minute'] == '05'): ?> selected<?php endif; ?>>05</option>
							<option value="10" <?php if ($this->_tpl_vars['invite_time_minute'] == '10'): ?> selected<?php endif; ?>>10</option>
							<option value="15" <?php if ($this->_tpl_vars['invite_time_minute'] == '15'): ?> selected<?php endif; ?>>15</option>
							<option value="20" <?php if ($this->_tpl_vars['invite_time_minute'] == '20'): ?> selected<?php endif; ?>>20</option>
							<option value="25" <?php if ($this->_tpl_vars['invite_time_minute'] == '25'): ?> selected<?php endif; ?>>25</option>
							<option value="30" <?php if ($this->_tpl_vars['invite_time_minute'] == '30'): ?> selected<?php endif; ?>>30</option>
							<option value="35" <?php if ($this->_tpl_vars['invite_time_minute'] == '35'): ?> selected<?php endif; ?>>35</option>
							<option value="40" <?php if ($this->_tpl_vars['invite_time_minute'] == '40'): ?> selected<?php endif; ?>>40</option>
							<option value="45" <?php if ($this->_tpl_vars['invite_time_minute'] == '45'): ?> selected<?php endif; ?>>45</option>
							<option value="50" <?php if ($this->_tpl_vars['invite_time_minute'] == '50'): ?> selected<?php endif; ?>>50</option>
							<option value="55" <?php if ($this->_tpl_vars['invite_time_minute'] == '55'): ?> selected<?php endif; ?>>55</option>
						</select>
						<label for="invite_time_minute" class="color-theme"><?php echo $this->_tpl_vars['inviteMin']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m6">
						<select id="start_time_hour" name="start_time_hour">
							<option value="00" <?php if ($this->_tpl_vars['start_time_hour'] == '00'): ?> selected<?php endif; ?>>00</option>
							<option value="01" <?php if ($this->_tpl_vars['start_time_hour'] == '01'): ?> selected<?php endif; ?>>01</option>
							<option value="02" <?php if ($this->_tpl_vars['start_time_hour'] == '02'): ?> selected<?php endif; ?>>02</option>
							<option value="03" <?php if ($this->_tpl_vars['start_time_hour'] == '03'): ?> selected<?php endif; ?>>03</option>
							<option value="04" <?php if ($this->_tpl_vars['start_time_hour'] == '04'): ?> selected<?php endif; ?>>04</option>
							<option value="05" <?php if ($this->_tpl_vars['start_time_hour'] == '05'): ?> selected<?php endif; ?>>05</option>
							<option value="06" <?php if ($this->_tpl_vars['start_time_hour'] == '06'): ?> selected<?php endif; ?>>06</option>
							<option value="07" <?php if ($this->_tpl_vars['start_time_hour'] == '07'): ?> selected<?php endif; ?>>07</option>
							<option value="08" <?php if ($this->_tpl_vars['start_time_hour'] == '08'): ?> selected<?php endif; ?>>08</option>
							<option value="09" <?php if ($this->_tpl_vars['start_time_hour'] == '09'): ?> selected<?php endif; ?>>09</option>
							<option value="10" <?php if ($this->_tpl_vars['start_time_hour'] == '10'): ?> selected<?php endif; ?>>10</option>
							<option value="11" <?php if ($this->_tpl_vars['start_time_hour'] == '11'): ?> selected<?php endif; ?>>11</option>
							<option value="12" <?php if ($this->_tpl_vars['start_time_hour'] == '12'): ?> selected<?php endif; ?>>12</option>
							<option value="13" <?php if ($this->_tpl_vars['start_time_hour'] == '13'): ?> selected<?php endif; ?>>13</option>
							<option value="14" <?php if ($this->_tpl_vars['start_time_hour'] == '14'): ?> selected<?php endif; ?>>14</option>
							<option value="15" <?php if ($this->_tpl_vars['start_time_hour'] == '15'): ?> selected<?php endif; ?>>15</option>
							<option value="16" <?php if ($this->_tpl_vars['start_time_hour'] == '16'): ?> selected<?php endif; ?>>16</option>
							<option value="17" <?php if ($this->_tpl_vars['start_time_hour'] == '17'): ?> selected<?php endif; ?>>17</option>
							<option value="18" <?php if ($this->_tpl_vars['start_time_hour'] == '18'): ?> selected<?php endif; ?>>18</option>
							<option value="19" <?php if ($this->_tpl_vars['start_time_hour'] == '19'): ?> selected<?php endif; ?>>19</option>
							<option value="20" <?php if ($this->_tpl_vars['start_time_hour'] == '20'): ?> selected<?php endif; ?>>20</option>
							<option value="21" <?php if ($this->_tpl_vars['start_time_hour'] == '21'): ?> selected<?php endif; ?>>21</option>
							<option value="22" <?php if ($this->_tpl_vars['start_time_hour'] == '22'): ?> selected<?php endif; ?>>22</option>
							<option value="23" <?php if ($this->_tpl_vars['start_time_hour'] == '23'): ?> selected<?php endif; ?>>23</option>
						</select>
						<label for="start_time_hour" class="color-theme"><?php echo $this->_tpl_vars['startHour']; ?>
</label>
					</div>
					<div class="input-field col s6 m6">
						<select id="start_time_minute" name="start_time_minute">
							<option value="00" <?php if ($this->_tpl_vars['start_time_minute'] == '00'): ?> selected<?php endif; ?>>00</option>
							<option value="05" <?php if ($this->_tpl_vars['start_time_minute'] == '05'): ?> selected<?php endif; ?>>05</option>
							<option value="10" <?php if ($this->_tpl_vars['start_time_minute'] == '10'): ?> selected<?php endif; ?>>10</option>
							<option value="15" <?php if ($this->_tpl_vars['start_time_minute'] == '15'): ?> selected<?php endif; ?>>15</option>
							<option value="20" <?php if ($this->_tpl_vars['start_time_minute'] == '20'): ?> selected<?php endif; ?>>20</option>
							<option value="25" <?php if ($this->_tpl_vars['start_time_minute'] == '25'): ?> selected<?php endif; ?>>25</option>
							<option value="30" <?php if ($this->_tpl_vars['start_time_minute'] == '30'): ?> selected<?php endif; ?>>30</option>
							<option value="35" <?php if ($this->_tpl_vars['start_time_minute'] == '35'): ?> selected<?php endif; ?>>35</option>
							<option value="40" <?php if ($this->_tpl_vars['start_time_minute'] == '40'): ?> selected<?php endif; ?>>40</option>
							<option value="45" <?php if ($this->_tpl_vars['start_time_minute'] == '45'): ?> selected<?php endif; ?>>45</option>
							<option value="50" <?php if ($this->_tpl_vars['start_time_minute'] == '50'): ?> selected<?php endif; ?>>50</option>
							<option value="55" <?php if ($this->_tpl_vars['start_time_minute'] == '55'): ?> selected<?php endif; ?>>55</option>
						</select>
						<label for="start_time_minute" class="color-theme"><?php echo $this->_tpl_vars['startMin']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="freeze_time" name="freeze_time">
							<option value="00" <?php if ($this->_tpl_vars['freeze_time'] == '00'): ?> selected<?php endif; ?>>00</option>
							<option value="01" <?php if ($this->_tpl_vars['freeze_time'] == '01'): ?> selected<?php endif; ?>>01</option>
							<option value="02" <?php if ($this->_tpl_vars['freeze_time'] == '02'): ?> selected<?php endif; ?>>02</option>
							<option value="03" <?php if ($this->_tpl_vars['freeze_time'] == '03'): ?> selected<?php endif; ?>>03</option>
							<option value="04" <?php if ($this->_tpl_vars['freeze_time'] == '04'): ?> selected<?php endif; ?>>04</option>
							<option value="05" <?php if ($this->_tpl_vars['freeze_time'] == '05'): ?> selected<?php endif; ?>>05</option>
							<option value="06" <?php if ($this->_tpl_vars['freeze_time'] == '06'): ?> selected<?php endif; ?>>06</option>
							<option value="07" <?php if ($this->_tpl_vars['freeze_time'] == '07'): ?> selected<?php endif; ?>>07</option>
							<option value="08" <?php if ($this->_tpl_vars['freeze_time'] == '08'): ?> selected<?php endif; ?>>08</option>
							<option value="09" <?php if ($this->_tpl_vars['freeze_time'] == '09'): ?> selected<?php endif; ?>>09</option>
							<option value="10" <?php if ($this->_tpl_vars['freeze_time'] == '10'): ?> selected<?php endif; ?>>10</option>
							<option value="11" <?php if ($this->_tpl_vars['freeze_time'] == '11'): ?> selected<?php endif; ?>>11</option>
							<option value="12" <?php if ($this->_tpl_vars['freeze_time'] == '12'): ?> selected<?php endif; ?>>12</option>
							<option value="13" <?php if ($this->_tpl_vars['freeze_time'] == '13'): ?> selected<?php endif; ?>>13</option>
							<option value="14" <?php if ($this->_tpl_vars['freeze_time'] == '14'): ?> selected<?php endif; ?>>14</option>
							<option value="15" <?php if ($this->_tpl_vars['freeze_time'] == '15'): ?> selected<?php endif; ?>>15</option>
							<option value="16" <?php if ($this->_tpl_vars['freeze_time'] == '16'): ?> selected<?php endif; ?>>16</option>
							<option value="17" <?php if ($this->_tpl_vars['freeze_time'] == '17'): ?> selected<?php endif; ?>>17</option>
							<option value="18" <?php if ($this->_tpl_vars['freeze_time'] == '18'): ?> selected<?php endif; ?>>18</option>
							<option value="19" <?php if ($this->_tpl_vars['freeze_time'] == '19'): ?> selected<?php endif; ?>>19</option>
							<option value="20" <?php if ($this->_tpl_vars['freeze_time'] == '20'): ?> selected<?php endif; ?>>20</option>
							<option value="21" <?php if ($this->_tpl_vars['freeze_time'] == '21'): ?> selected<?php endif; ?>>21</option>
							<option value="22" <?php if ($this->_tpl_vars['freeze_time'] == '22'): ?> selected<?php endif; ?>>22</option>
							<option value="23" <?php if ($this->_tpl_vars['freeze_time'] == '23'): ?> selected<?php endif; ?>>23</option>
						</select>
						<label for="freeze_time" class="color-theme"><?php echo $this->_tpl_vars['freezeText']; ?>
</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="title" name="title" class="validate  <?php if (isset ( $this->_tpl_vars['errorTitle'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorTitle'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="title" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorTitle'] )): ?><?php echo $this->_tpl_vars['titleError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['titleText']; ?>
</label>	
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<textarea type="text" id="descriptionText" name="description" class="materialize-textarea validate <?php if (isset ( $this->_tpl_vars['errorDescription'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorDescription'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
						<label for="descriptionText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorDescription'] )): ?><?php echo $this->_tpl_vars['descriptionError']; ?>
<?php endif; ?>"}"><?php echo $this->_tpl_vars['descriptionText']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select class="icons" id="iconText" name="icon_name"><?php echo $this->_tpl_vars['icons']; ?>
</select>
						<label for="iconText" class="color-theme"><?php echo $this->_tpl_vars['iconText']; ?>
</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['minimum_level'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="minText" name="minimum_level" class="validate <?php if (isset ( $this->_tpl_vars['errorMin'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMin'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="minText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMin'] )): ?><?php echo $this->_tpl_vars['minError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['minText']; ?>
</label>	
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['maximum_level'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="maxText" name="maximum_level" class="validate <?php if (isset ( $this->_tpl_vars['errorMax'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMax'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="maxText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMax'] )): ?><?php echo $this->_tpl_vars['maxError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['maxText']; ?>
</label>	
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['maximum'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="raidersText" name="maximum" class="validate <?php if (isset ( $this->_tpl_vars['errorMaximum'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMaximum'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="raidersText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMaximum'] )): ?><?php echo $this->_tpl_vars['maximumError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['raidersText']; ?>
</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="saveText" name="save" class="filled-in" <?php if ($this->_tpl_vars['save']): ?>checked="checked"<?php endif; ?>/>
						<label for="saveText" class="color-theme"><?php echo $this->_tpl_vars['saveText']; ?>
</label>	
					</div>
				</div>
				<?php echo $this->_tpl_vars['class_limits']; ?>
						
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