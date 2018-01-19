<div class="container-fluid" id="sectionRaidsForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_backups">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row mb-0">
							<label for="chooseTables" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$chooseTables}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select multiple size="8" class="form-control  inputCard inputCard-border" id="chooseTables" name="tables[]">
									{foreach name=backupTableNames from=$tables item=table}
										<option value="{$table}">{$table}</option>
									{/foreach}
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