<?php /* Smarty version 2.6.26, created on 2017-12-21 15:19:42
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/configuration_install_game.tpl */ ?>
<div class="container" id="containerConfigurationGame">	
	<div class="panel color-bg-menu color-br-panel z-depth-4">
		<div class="panel-header center-align color-bg-header color-theme">
			<?php echo $this->_tpl_vars['header']; ?>

		</div>
		<?php if (isset ( $this->_tpl_vars['zip_support'] )): ?>
			<form method="post" enctype="multipart/form-data" action="index.php?option=com_configuration&task=<?php echo $this->_tpl_vars['task']; ?>
">
				<div class="panel-content color-br-panel">
					<div class="row">
						<div class="col s12">
							<?php echo $this->_tpl_vars['game']; ?>

						</div>
					</div>
					<div class="row">
						<div class="file-field input-field">
							<div class="file-path-wrapper col s12 m6">
								<input type="text" id="fileName_text" name="game_file" class="file-path validate" placeholder="<?php echo $this->_tpl_vars['fileName_text']; ?>
">
							</div>
							<div class="btn color-btn-theme waves-effect waves-light col s12 m2">
								<i class="material-icons">folder_open</i>
								<input type="file">
							</div>
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
			<div class="panel-content color-br-panel">
				<?php if (isset ( $this->_tpl_vars['zip_disabled'] )): ?>
					<div class="row"><?php echo $this->_tpl_vars['zip_disabled']; ?>
</div>
				<?php endif; ?>
				<div class="row"><?php echo $this->_tpl_vars['manual_installation']; ?>
</div>
			</div>
			<div class="panel-footer center-align color-bg-footer">
				&nbsp;
			</div>
		<?php endif; ?>
	</div>
</div>