<div class="container-fluid" id="sectionSpecialisation">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_specialisations&amp;task=delete" onSubmit="return display_confirm('{$confirm_delete}')">
				<div class="card sectionCard" id="sectionDefinitionsSpe">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$spes_header}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$spes}
						</div>
					</div>
					<div class="card-footer sectionCard--footer content--table text-right">
						<a class="btn btn--sectionFooter--action btn--bg" href="index.php?option=com_specialisations&amp;task=new">
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
