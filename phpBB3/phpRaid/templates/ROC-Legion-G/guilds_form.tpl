<div class="container-fluid" id="sectionGuildsForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_guilds&task={$task}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row">
							<label for="nameText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$nameText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="nameText" placeholder="{$nameText}" name="guild_name" value="{$guild_name|escape}">
								<div class="form-control-feedback text-danger">{validate id="name" message="$nameError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="tagText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$tagText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="tagText" placeholder="{$tagText}" name="guild_tag" value="{$guild_tag|escape}">
								<div class="form-control-feedback text-danger">{validate id="tag" message="$tagError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="masterText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$masterText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="masterText" placeholder="{$masterText}" name="guild_master" value="{$guild_master|escape}">
								<div class="form-control-feedback text-danger">{validate id="master" message="$masterError"}</div>
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