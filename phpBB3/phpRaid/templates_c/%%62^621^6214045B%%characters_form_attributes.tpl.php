<?php /* Smarty version 2.6.26, created on 2017-10-18 11:55:35
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/characters_form_attributes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/characters_form_attributes.tpl', 7, false),)), $this); ?>
<?php ob_start(); ?>
	<?php unset($this->_sections['atts']);
$this->_sections['atts']['name'] = 'atts';
$this->_sections['atts']['loop'] = is_array($_loop=$this->_tpl_vars['a_data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['atts']['show'] = true;
$this->_sections['atts']['max'] = $this->_sections['atts']['loop'];
$this->_sections['atts']['step'] = 1;
$this->_sections['atts']['start'] = $this->_sections['atts']['step'] > 0 ? 0 : $this->_sections['atts']['loop']-1;
if ($this->_sections['atts']['show']) {
    $this->_sections['atts']['total'] = $this->_sections['atts']['loop'];
    if ($this->_sections['atts']['total'] == 0)
        $this->_sections['atts']['show'] = false;
} else
    $this->_sections['atts']['total'] = 0;
if ($this->_sections['atts']['show']):

            for ($this->_sections['atts']['index'] = $this->_sections['atts']['start'], $this->_sections['atts']['iteration'] = 1;
                 $this->_sections['atts']['iteration'] <= $this->_sections['atts']['total'];
                 $this->_sections['atts']['index'] += $this->_sections['atts']['step'], $this->_sections['atts']['iteration']++):
$this->_sections['atts']['rownum'] = $this->_sections['atts']['iteration'];
$this->_sections['atts']['index_prev'] = $this->_sections['atts']['index'] - $this->_sections['atts']['step'];
$this->_sections['atts']['index_next'] = $this->_sections['atts']['index'] + $this->_sections['atts']['step'];
$this->_sections['atts']['first']      = ($this->_sections['atts']['iteration'] == 1);
$this->_sections['atts']['last']       = ($this->_sections['atts']['iteration'] == $this->_sections['atts']['total']);
?>
		<div class="form-group row form-group-row <?php if ($this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['compt'] == '2'): ?>mb-0<?php endif; ?>">
			<label for="<?php echo $this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['text']; ?>
" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label"><?php echo $this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['text']; ?>
</label>
			<div class="col-12 col-sm-4 col-md-3">
				<input type="text" class="form-control  inputCard inputCard-border" id="<?php echo $this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['name']; ?>
" placeholder="<?php echo $this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['text']; ?>
" name="<?php echo $this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['name']; ?>
" value="<?php echo $this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['value']; ?>
">
				<div class="form-control-feedback text-danger"><?php echo smarty_function_validate(array('id' => ($this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['name']),'message' => ($this->_tpl_vars['a_data'][$this->_sections['atts']['index']]['errortext'])), $this);?>
</div>
			</div>
		</div>
	<?php endfor; endif; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('attributes', ob_get_contents());ob_end_clean(); ?>