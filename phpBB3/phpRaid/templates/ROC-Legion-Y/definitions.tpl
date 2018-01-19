<div class="container-fluid" id="sectionDefinitions">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_definitions&amp;task=delete&amp;mode=race" onSubmit="return display_confirm('{$confirm_delete}')">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$races_header}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$races}
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
			<form method="POST" action="index.php?option=com_definitions&amp;task=delete&amp;mode=class" onSubmit="return display_confirm('{$confirm_delete}')">
				<div class="card sectionCard" id="sectionDefinitionsClass">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$classes_header}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$classes}
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
