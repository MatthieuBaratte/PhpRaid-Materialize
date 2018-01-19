<?php /* Smarty version 2.6.26, created on 2017-11-09 11:32:27
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/members.tpl */ ?>
<div class="container-fluid" id="sectionMembers">
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_members&amp;task=delete" onSubmit="return display_confirm('<?php echo $this->_tpl_vars['confirm_delete']; ?>
')">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center"><?php echo $this->_tpl_vars['header']; ?>
</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							<?php echo $this->_tpl_vars['output']; ?>

						</div>
					</div>
					<div class="card-footer sectionCard--footer content--table text-right">
						<?php echo $this->_tpl_vars['admin']; ?>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>