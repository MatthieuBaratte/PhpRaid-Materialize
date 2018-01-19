<div class="container-fluid" id="sectionAttributesForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_attributes&task={$task}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row">
							<label for="typeText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$typeText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="typeText" name="att_type">
									<option value="numeric" {if $att_type == numeric} selected{/if}>{$numericText}</option>
									<option value="text" {if $att_type == text} selected{/if}>{$textText}</option>
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="iconText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$iconText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control inputCard inputCard-border" id="iconText" name="att_icon">
									{$attributes}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="nameText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$nameText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control inputCard inputCard-border" id="nameText" placeholder="{$nameText}" name="att_name" value="{$att_name|escape}">
								<div class="form-control-feedback text-danger">{validate id="name" message="$nameError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="showText" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$showText}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="showText" name="att_show" value="1" {if $att_show}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="hoverText" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$hoverText}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="hoverText" name="att_hover" value="1" {if $att_hover}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
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