<?php /* Smarty version 2.6.26, created on 2017-10-30 15:18:39
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/backups.tpl */ ?>
<div class="container" id="containerRaidsForm">		
	<form method="post" action="index.php?option=com_backups">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				<?php echo $this->_tpl_vars['header']; ?>

			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select multiple id="chooseTables" name="tables[]">
							<?php $_from = $this->_tpl_vars['tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['backupTableNames'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['backupTableNames']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['table']):
        $this->_foreach['backupTableNames']['iteration']++;
?>
								<option value="<?php echo $this->_tpl_vars['table']; ?>
"><?php echo $this->_tpl_vars['table']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
						<label for="chooseTables" class="color-theme"><?php echo $this->_tpl_vars['chooseTables']; ?>
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