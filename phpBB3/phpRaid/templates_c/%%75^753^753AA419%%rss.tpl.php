<?php /* Smarty version 2.6.26, created on 2017-09-08 18:47:54
         compiled from /home/colossius/www/phpBB3/phpRaid/templates/ROC-Legion/rss.tpl */ ?>
<div class="container-fluid" id="sectionRSS">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<div class="card sectionCard">
				<div class="card-header sectionCard--header">
					<div class="header--title text-center"><?php echo $this->_tpl_vars['header']; ?>
</div>
				</div>
				<div class="card-block sectionCard--content text-left">
					<span class="content--description">
						<?php echo $this->_tpl_vars['rssAvailable']; ?>

					</span>
					<?php echo $this->_tpl_vars['rssRaids']; ?>

					<?php echo $this->_tpl_vars['rssAnnouncements']; ?>

				</div>
				<div class="card-block sectionCard--footer">
						&nbsp;
				</div>	
			</div>
		</div>
	</div>
</div>