<?php /* Smarty version 2.6.26, created on 2017-11-09 11:32:28
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/announcements_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/announcements_form.tpl', 8, false),array('modifier', 'escape', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/announcements_form.tpl', 12, false),)), $this); ?>
<div class="container" id="containerAnnoucementsForm">	
	<form method="post" action="index.php?option=com_announcements&task=<?php echo $this->_tpl_vars['task']; ?>
">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				<?php echo $this->_tpl_vars['header']; ?>

			</div>
			<div class="panel-content color-br-panel">
				<?php echo smarty_function_validate(array('id' => 'title','message' => ($this->_tpl_vars['titleError']),'assign' => 'errorTitle'), $this);?>

				<?php echo smarty_function_validate(array('id' => 'message','message' => ($this->_tpl_vars['messageError']),'assign' => 'errorMessage'), $this);?>

				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['announcement_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="titleText" name="announcement_title" class="validate <?php if (isset ( $this->_tpl_vars['errorTitle'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorTitle'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
						<label for="titleText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorTitle'] )): ?><?php echo $this->_tpl_vars['titleError']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['titleText']; ?>
</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<textarea id="messageText" name="announcement_msg" class="materialize-textarea validate <?php if (isset ( $this->_tpl_vars['errorMessage'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorMessage'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['announcement_msg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
						<label for="messageText" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorMessage'] )): ?><?php echo $this->_tpl_vars['messageError']; ?>
<?php endif; ?>"}"><?php echo $this->_tpl_vars['messageText']; ?>
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