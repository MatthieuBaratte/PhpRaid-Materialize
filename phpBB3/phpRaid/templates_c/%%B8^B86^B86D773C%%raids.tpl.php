<?php /* Smarty version 2.6.26, created on 2017-09-19 09:27:32
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/raids.tpl */ ?>
<div class="container-fluid" id="sectionRaids">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_raids&task=delete" onSubmit="return display_confirm('<?php echo $this->_tpl_vars['confirm_delete']; ?>
')">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center"><?php echo $this->_tpl_vars['new_header']; ?>
</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							<?php echo $this->_tpl_vars['new']; ?>

						</div>
					</div>
					<div class="card-block sectionCard--footer content--table text-right">
						<button type="submit" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete"><i class="material-icons md-14">delete</i></button>
					</div>
				</div>
				<div class="card sectionCard" id="sectionRaidsOld">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center"><?php echo $this->_tpl_vars['old_header']; ?>
</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							<?php echo $this->_tpl_vars['old']; ?>

						</div>
					</div>
					<div class="card-block sectionCard--footer content--table text-right">
						<button type="submit" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete"><i class="material-icons md-14">delete</i></button>
					</div>
				</div>	
			</form>
		</div>
	</div>
</div>