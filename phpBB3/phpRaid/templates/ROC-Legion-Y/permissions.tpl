<div class="container-fluid" id="sectionPermissions">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="POST" action="index.php?option=com_permissions&task=delete" onSubmit="return display_confirm('{$confirm_delete}')">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$output}
						</div>
					</div>
					<div class="card-footer sectionCard--footer content--table">
						&nbsp;
					</div>
				</div>
			</form>
		</div>
	</div>
</div>		