<div class="container-fluid" id="sectionRolesForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_roles&task={$task}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row">
							<label for="nameText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$nameText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="nameText" placeholder="{$nameText}" name="role_name" value="{$role_name|escape}">
								<div class="form-control-feedback text-danger">{validate id="name" message="$nameError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="headerText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$headerText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="headerText" placeholder="{$headerText}" name="header_color" value="{$header_color|escape}">
								<div class="form-control-feedback text-danger">{validate id="header" message="$headerError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="bodyText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$bodyText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="bodyText" placeholder="{$bodyText}" name="body_color" value="{$body_color|escape}">
								<div class="form-control-feedback text-danger">{validate id="body" message="$bodyError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="fontText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$fontText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="fontText" placeholder="{$fontText}" name="font_color" value="{$font_color|escape}">
								<div class="form-control-feedback text-danger">{validate id="font" message="$fontError"}</div>
							</div>
						</div>
					</div>
					<div class="card-block sectionCard--footer text-center">
						<div class="col-sm-12">
							<button type="submit" class="btn btn--sectionFooter btn--bg" value="{$submit}">{$submit}</button>
							<button type="reset" class="btn btn--sectionFooter btn--bg" value="{$reset}">{$reset}</button>
						</div>
					</div>
				</div>
			</form>   
		</div>
	</div>
</div>