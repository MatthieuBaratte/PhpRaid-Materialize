<?php /* Smarty version 2.6.26, created on 2017-09-28 12:22:57
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/definitions.tpl */ ?>
<div class="container-fluid" id="sectionDefinitions">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_definitions&amp;task=delete&amp;mode=race" onSubmit="return display_confirm('<?php echo $this->_tpl_vars['confirm_delete']; ?>
')">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center"><?php echo $this->_tpl_vars['races_header']; ?>
</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							<?php echo $this->_tpl_vars['races']; ?>

						</div>
					</div>
					<div class="card-footer sectionCard--footer content--table text-right">
						<a class="btn btn--sectionFooter--action btn--bg" href="index.php?option=com_definitions&amp;task=new&amp;mode=race">
							<i class="material-icons md-14">add</i>
						</a>
						<button type="input" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete">
							<i class="material-icons md-14">delete</i>
						</button>
					</div>
				</div>
			</form>
			<form method="POST" action="index.php?option=com_definitions&amp;task=delete&amp;mode=class" onSubmit="return display_confirm('<?php echo $this->_tpl_vars['confirm_delete']; ?>
')">
				<div class="card sectionCard" id="sectionDefinitionsClass">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center"><?php echo $this->_tpl_vars['classes_header']; ?>
</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							<?php echo $this->_tpl_vars['classes']; ?>

						</div>
					</div>
					<div class="card-footer sectionCard--footer content--table text-right">
						<a class="btn btn--sectionFooter--action btn--bg" href="index.php?option=com_definitions&amp;task=new&amp;mode=class">
							<i class="material-icons md-14">add</i>
						</a>
						<button type="input" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete">
							<i class="material-icons md-14">delete</i>
						</button>
					</div>
				</div>
			</form>				
		</div>
	</div>
</div>