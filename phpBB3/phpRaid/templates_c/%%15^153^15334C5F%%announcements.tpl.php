<?php /* Smarty version 2.6.26, created on 2017-09-05 11:00:03
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/plugins/plugin_announcements/announcements.tpl */ ?>
<?php ob_start(); ?>
	<?php unset($this->_sections['announcements']);
$this->_sections['announcements']['name'] = 'announcements';
$this->_sections['announcements']['loop'] = is_array($_loop=1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['announcements']['show'] = true;
$this->_sections['announcements']['max'] = $this->_sections['announcements']['loop'];
$this->_sections['announcements']['step'] = 1;
$this->_sections['announcements']['start'] = $this->_sections['announcements']['step'] > 0 ? 0 : $this->_sections['announcements']['loop']-1;
if ($this->_sections['announcements']['show']) {
    $this->_sections['announcements']['total'] = $this->_sections['announcements']['loop'];
    if ($this->_sections['announcements']['total'] == 0)
        $this->_sections['announcements']['show'] = false;
} else
    $this->_sections['announcements']['total'] = 0;
if ($this->_sections['announcements']['show']):

            for ($this->_sections['announcements']['index'] = $this->_sections['announcements']['start'], $this->_sections['announcements']['iteration'] = 1;
                 $this->_sections['announcements']['iteration'] <= $this->_sections['announcements']['total'];
                 $this->_sections['announcements']['index'] += $this->_sections['announcements']['step'], $this->_sections['announcements']['iteration']++):
$this->_sections['announcements']['rownum'] = $this->_sections['announcements']['iteration'];
$this->_sections['announcements']['index_prev'] = $this->_sections['announcements']['index'] - $this->_sections['announcements']['step'];
$this->_sections['announcements']['index_next'] = $this->_sections['announcements']['index'] + $this->_sections['announcements']['step'];
$this->_sections['announcements']['first']      = ($this->_sections['announcements']['iteration'] == 1);
$this->_sections['announcements']['last']       = ($this->_sections['announcements']['iteration'] == $this->_sections['announcements']['total']);
?>
		<div class="container-fluid" id="announcementPlugin">
			<div class="row">
				<div class="offset-xl-1 col-12 col-xl-10">
					<div class="card sectionCard">
						<div class="card-header sectionCard--header header--announce">
							<div class="btn icone--header icone--announce"><i class="material-icons md-18">whatshot</i></div>
							<div class="header--title div-left"><?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['titleblock']; ?>
</div>
							<?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['actions']; ?>

						</div>
						<div class="card-block sectionCard--content">
							<span class="content--header"><?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['title']; ?>
</span>
							<span class="content--description"><?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['message']; ?>
</span>
							<span class="content--footer text-right"><?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['author']; ?>
 @ <?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['date']; ?>
 - <?php echo $this->_tpl_vars['a_data'][$this->_sections['announcements']['index']]['time']; ?>
</span>
						</div>
					</div>			
				</div>
			</div>
		</div>
	<?php endfor; endif; ?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('plugin_announcements', ob_get_contents());ob_end_clean(); ?>