<div class="container-fluid" id="sectionDefinitionsRaceForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_definitions&task={$task}&mode={$mode}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$raceHeader}</div>
					</div>
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row">
							<label for="raceNameText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$raceNameText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="raceNameText" placeholder="{$raceNameText}" name="name" value="{$name|escape}">
								<div class="form-control-feedback text-danger">{validate id="name" message="$raceNameError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="restrictionsText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$restrictionsText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select multiple size="8" class="form-control  inputCard inputCard-border" id="restrictionsText" name="restrictions[]">
									{$rest_option}
								</select>
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