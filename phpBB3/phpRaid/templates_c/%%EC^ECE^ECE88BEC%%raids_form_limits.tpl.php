<?php /* Smarty version 2.6.26, created on 2017-10-16 15:48:37
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids_form_limits.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids_form_limits.tpl', 4, false),)), $this); ?>
<?php ob_start(); ?>
	<?php unset($this->_sections['limits']);
$this->_sections['limits']['name'] = 'limits';
$this->_sections['limits']['loop'] = is_array($_loop=$this->_tpl_vars['l_data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['limits']['show'] = true;
$this->_sections['limits']['max'] = $this->_sections['limits']['loop'];
$this->_sections['limits']['step'] = 1;
$this->_sections['limits']['start'] = $this->_sections['limits']['step'] > 0 ? 0 : $this->_sections['limits']['loop']-1;
if ($this->_sections['limits']['show']) {
    $this->_sections['limits']['total'] = $this->_sections['limits']['loop'];
    if ($this->_sections['limits']['total'] == 0)
        $this->_sections['limits']['show'] = false;
} else
    $this->_sections['limits']['total'] = 0;
if ($this->_sections['limits']['show']):

            for ($this->_sections['limits']['index'] = $this->_sections['limits']['start'], $this->_sections['limits']['iteration'] = 1;
                 $this->_sections['limits']['iteration'] <= $this->_sections['limits']['total'];
                 $this->_sections['limits']['index'] += $this->_sections['limits']['step'], $this->_sections['limits']['iteration']++):
$this->_sections['limits']['rownum'] = $this->_sections['limits']['iteration'];
$this->_sections['limits']['index_prev'] = $this->_sections['limits']['index'] - $this->_sections['limits']['step'];
$this->_sections['limits']['index_next'] = $this->_sections['limits']['index'] + $this->_sections['limits']['step'];
$this->_sections['limits']['first']      = ($this->_sections['limits']['iteration'] == 1);
$this->_sections['limits']['last']       = ($this->_sections['limits']['iteration'] == $this->_sections['limits']['total']);
?>
		<?php if ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text'] == 'Dps'): ?>
			<?php echo smarty_function_validate(array('id' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['name']),'message' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext']),'assign' => 'errorDps'), $this);?>

			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['value']; ?>
" id="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" name="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['field']; ?>
" class="validate <?php if (isset ( $this->_tpl_vars['errorDps'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorDps'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
					<label for="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorDps'] )): ?><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
</label>	
				</div>
			</div>
		<?php elseif ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text'] == 'Healer'): ?>
			<?php echo smarty_function_validate(array('id' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['name']),'message' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext']),'assign' => 'errorHealer'), $this);?>

			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['value']; ?>
" id="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" name="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['field']; ?>
" class="validate <?php if (isset ( $this->_tpl_vars['errorHealer'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorHealer'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
					<label for="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorHealer'] )): ?><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
</label>	
				</div>
			</div>
		<?php elseif ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text'] == 'Tank'): ?>
			<?php echo smarty_function_validate(array('id' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['name']),'message' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext']),'assign' => 'errorTank'), $this);?>

			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['value']; ?>
" id="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" name="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['field']; ?>
" class="validate <?php if (isset ( $this->_tpl_vars['errorTank'] )): ?><?php echo $this->_tpl_vars['classError']; ?>
<?php endif; ?>" <?php if (isset ( $this->_tpl_vars['errorTank'] )): ?><?php echo $this->_tpl_vars['propError']; ?>
<?php endif; ?>>
					<label for="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" class="color-theme" data-error="<?php if (isset ( $this->_tpl_vars['errorTank'] )): ?><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
</label>	
				</div>
			</div>
		<?php else: ?>
			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['value']; ?>
" id="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" name="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['field']; ?>
" class="validate">
					<label for="<?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
" class="color-theme" data-error="<?php echo smarty_function_validate(array('id' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['name']),'message' => ($this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['errortext'])), $this);?>
"><?php echo $this->_tpl_vars['l_data'][$this->_sections['limits']['index']]['text']; ?>
</label>	
				</div>
			</div>
		<?php endif; ?>
	<?php endfor; endif; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('class_limits', ob_get_contents());ob_end_clean(); ?>