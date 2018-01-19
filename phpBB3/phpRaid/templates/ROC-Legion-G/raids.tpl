<div class="container-fluid" id="sectionRaids">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_raids&task=delete" onSubmit="return display_confirm('{$confirm_delete}')">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$new_header}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$new}
						</div>
					</div>
					<div class="card-block sectionCard--footer content--table text-right">
						<button type="submit" class="btn btn--sectionFooter--action btn--bg-delete" aria-label="Delete"><i class="material-icons md-14">delete</i></button>
					</div>
				</div>
				<div class="card sectionCard" id="sectionRaidsOld">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$old_header}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$old}
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