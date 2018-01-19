<?php /* Smarty version 2.6.26, created on 2017-10-30 15:00:22
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/profile.tpl', 11, false),)), $this); ?>
<div class="container" id="containerProfil">	
	<div class="panel color-bg-menu color-br-panel z-depth-4">
		<div class="panel-header center-align color-bg-header color-theme">
			<?php echo $this->_tpl_vars['header']; ?>

		</div>
		<?php if ($this->_tpl_vars['authentype'] != 'phpbb3'): ?>
			<form method="post" action="index.php?option=com_profile">
				<div class="panel-content color-br-panel">
					<div class="row">
						<div class="input-field col s12 m6">
      						<input disabled type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="email" name="user_email">
      						<label for="email" class="color-theme"><?php echo $this->_tpl_vars['emailText']; ?>
</label>
    					</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
      						<input type="password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['new_password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="newPasswordText" name="new_password" class="validate <?php echo $this->_tpl_vars['materializedClassErrorConfirm']; ?>
" <?php echo $this->_tpl_vars['materializedPropErrorConfirm']; ?>
>
      						<label for="newPasswordText" class="color-theme" data-error="<?php echo $this->_tpl_vars['confirmPasswordError']; ?>
"><?php echo $this->_tpl_vars['newPasswordText']; ?>
</label>
    					</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
      						<input type="password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['confirm_password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="confirmPasswordText" name="confirm_password" class="validate <?php echo $this->_tpl_vars['materializedClassErrorConfirm']; ?>
" <?php echo $this->_tpl_vars['materializedPropErrorConfirm']; ?>
>
      						<label for="confirmPasswordText" class="color-theme" data-error="<?php echo $this->_tpl_vars['confirmPasswordError']; ?>
<?php echo $this->_tpl_vars['flagAuthentificationType']; ?>
"><?php echo $this->_tpl_vars['confirmPasswordText']; ?>
</label>
    					</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
      						<input type="password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['enter_password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="enterPasswordText" name="enter_password" class="validate <?php echo $this->_tpl_vars['materializedClassErrorEnter']; ?>
" <?php echo $this->_tpl_vars['materializedPropErrorEnter']; ?>
>
      						<label for="enterPasswordText" class="color-theme" data-error="<?php echo $this->_tpl_vars['enterPasswordError']; ?>
"><?php echo $this->_tpl_vars['enterPasswordText']; ?>
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
			</form>
		<?php else: ?>
			<div class="panel-content color-bg-warning color-br-panel color-warning">
				<div class="content-header"><?php echo $this->_tpl_vars['authenttitle']; ?>
</div>
				<div class="content-text"><?php echo $this->_tpl_vars['authentdesc']; ?>
</div>
			</div>
			<div class="panel-footer color-bg-footer"></div>
		<?php endif; ?>
		<div class="panel-content color-br-panel">
			<form method="post" action="index.php?option=com_profile&amp;task=load_icon">
				<div class="row">
					<div class="input-field col s12 m6">
						<select class="icons" id="avatarText" name="icon_name"><?php echo $this->_tpl_vars['avatars']; ?>
</select>
						<label for="avatarText" class="color-theme"><?php echo $this->_tpl_vars['avatarText']; ?>
</label>
					</div>
					<div class="col s12 m2">
						<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="submit"><i class="material-icons">file_upload</i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer color-bg-footer"></div>
	</div>
	 <div class="fixed-action-btn horizontal click-to-toggle">
</div>