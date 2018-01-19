<?php /* Smarty version 2.6.26, created on 2017-11-09 11:32:30
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/characters_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/characters_form.tpl', 11, false),array('modifier', 'escape', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/characters_form.tpl', 18, false),)), $this); ?>
<div class="container" id="containerCharactersForm">	
	<?php echo $this->_tpl_vars['scripts']; ?>

	<form name="character_new" method="post" action="index.php?option=com_characters&amp;task=<?php echo $this->_tpl_vars['task']; ?>
">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="card-header sectionCard--header">
				<div class="panel-header center-align color-bg-header color-theme">
					<?php echo $this->_tpl_vars['header']; ?>

				</div>
			</div>
			<div class="panel-content color-br-panel">
				<?php echo smarty_function_validate(array('id' => 'name','message' => ($this->_tpl_vars['nameError']),'assign' => 'errorName'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'race','message' => ($this->_tpl_vars['raceError']),'assign' => 'errorRace'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'class','message' => ($this->_tpl_vars['classError']),'assign' => 'errorClass'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'level','message' => ($this->_tpl_vars['levelError']),'assign' => 'errorLevel'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'ilvl','message' => ($this->_tpl_vars['ilvlError']),'assign' => 'errorIlvl'), $this);?>

				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['char_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="nameText" name="char_name" class="validate <?php if (isset ( $this->_tpl_vars['errorName'] )): ?><?php echo $this->_tpl_vars['materializedClassError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorName'] )): ?><?php echo $this->_tpl_vars['materializedPropError']; ?>
<?php endif; ?>>
						<label for="nameText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorName'] )): ?><?php echo $this->_tpl_vars['nameError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['nameText']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="raceText" name="race_id" onChange="addItem('race_id','class_id');addItemSpe1('class_id','spe1_id');addItemSpe2('class_id','spe2_id');update_select()" class="validate <?php if (isset ( $this->_tpl_vars['errorRace'] )): ?><?php echo $this->_tpl_vars['materializedClassError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorRace'] )): ?><?php echo $this->_tpl_vars['materializedPropError']; ?>
<?php endif; ?>><?php echo $this->_tpl_vars['races']; ?>
</select>
						<label for="raceText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorRace'] )): ?><?php echo $this->_tpl_vars['raceError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['raceText']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" value="4" id="subInitial">
						<input type="hidden" value="0" id="subNumber">
						<select id="classText" name="class_id" onChange="addItemSpe1('class_id','spe1_id');addItemSpe2('class_id','spe2_id');update_select()" class="validate <?php if (isset ( $this->_tpl_vars['errorClass'] )): ?><?php echo $this->_tpl_vars['materializedClassError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorClass'] )): ?><?php echo $this->_tpl_vars['materializedPropError']; ?>
<?php endif; ?>><?php echo $this->_tpl_vars['classes']; ?>
</select>
						<label for="classText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorClass'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['classText']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" value="5" id="subInitialSpe1">
						<input type="hidden" value="0" id="subNumberSpe1">
						<select id="spe1Text" name="spe1_id"><?php echo $this->_tpl_vars['spes']; ?>
</select>
						<label for="spe1Text" class="color-theme"><?php echo $this->_tpl_vars['spe1Text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" value="6" id="subInitialSpe2">
						<input type="hidden" value="0" id="subNumberSpe2">
						<select id="spe2Text" name="spe2_id"><?php echo $this->_tpl_vars['spes']; ?>
</select>
						<label for="spe2Text" class="color-theme"><?php echo $this->_tpl_vars['spe2Text']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="guildText" name="guild_id"><?php echo $this->_tpl_vars['guilds']; ?>
</select>
						<label for="guildText" class="color-theme"><?php echo $this->_tpl_vars['guildText']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="genderText" name="gender_id"><?php echo $this->_tpl_vars['genders']; ?>
</select>
						<label for="genderText" class="color-theme"><?php echo $this->_tpl_vars['genderText']; ?>
</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['char_level'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="levelText" name="char_level" class="validate <?php if (isset ( $this->_tpl_vars['errorLevel'] )): ?><?php echo $this->_tpl_vars['materializedClassError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorLevel'] )): ?><?php echo $this->_tpl_vars['materializedPropError']; ?>
<?php endif; ?>>
						<label for="levelText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorLevel'] )): ?><?php echo $this->_tpl_vars['levelError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['levelText']; ?>
</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ilvl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="ilvlText" name="ilvl" class="validate <?php if (isset ( $this->_tpl_vars['errorIlvl'] )): ?><?php echo $this->_tpl_vars['materializedClassError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorIlvl'] )): ?><?php echo $this->_tpl_vars['materializedPropError']; ?>
<?php endif; ?>>
						<label for="nameText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorIlvl'] )): ?><?php echo $this->_tpl_vars['ilvlError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['ilvlText']; ?>
</label>
					</div>
				</div>
				<?php echo $this->_tpl_vars['attributes']; ?>

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
	<!-- this image is used for the loading of the javascript only -->
	<img class="hide" src="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/pixel.png" onload="setupItems('subInitial','race_id','class_id')" alt="">
	<img class="hide" src="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/pixel.png" onload="setupItemsSpe1('subInitialSpe1','class_id','spe1_id')" alt="">
	<img class="hide" src="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/pixel.png" onload="setupItemsSpe2('subInitialSpe2','class_id','spe2_id')" alt="">
</div>