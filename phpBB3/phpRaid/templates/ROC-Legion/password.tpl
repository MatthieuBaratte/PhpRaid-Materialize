<div class="container-fluid" id="sectionPassword">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_password"">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row mb-0">
							<label for="emailText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$emailText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="emailText" placeholder="{$emailText}" name="user_email" value="{$user_email|escape}">
								<div class="form-control-feedback text-danger">{validate id="email" message="$emailError"}{$error}</div>
							</div>
						</div>	
					</div>
					<div class="card-block sectionCard--footer text-center">
						<button type="submit" class="btn btn--sectionFooter btn--bg" value="{$submit}">{$submit}</button>
						<button type="reset" class="btn btn--sectionFooter btn--bg" value="{$reset}">{$reset}</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> 