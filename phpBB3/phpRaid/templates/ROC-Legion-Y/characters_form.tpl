<div class="container-fluid" id="sectionCharactersForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			{$scripts}
			<form name="character_new" method="post" action="index.php?option=com_characters&amp;task={$task}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row">
							<label for="nameText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$nameText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="nameText" placeholder="{$nameText}" name="char_name" value="{$char_name|escape}">
								<div class="form-control-feedback text-danger">{validate id="name" message="$nameError"}{$char_exists}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="raceText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$raceText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="raceText" name="race_id" onChange="addItem('race_id','class_id');addItemSpe1('class_id','spe1_id');addItemSpe2('class_id','spe2_id')">{$races}</select>
								<div class="form-control-feedback text-danger">{validate id="race" message="$raceError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="classText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$classText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="hidden" value="4" id="subInitial">
								<input type="hidden" value="0" id="subNumber">
								<select class="form-control  inputCard inputCard-border" id="classText"  name="class_id" onChange="addItemSpe1('class_id','spe1_id');addItemSpe2('class_id','spe2_id')">{$classes}</select> {$addClassText} 
								<div class="form-control-feedback text-danger">{validate id="class" message="$classError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="spe1Text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$spe1Text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="hidden" value="5" id="subInitialSpe1">
								<input type="hidden" value="0" id="subNumberSpe1">
								<select class="form-control  inputCard inputCard-border" id="spe1Text"  name="spe1_id">{$spes}</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="spe2Text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$spe2Text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="hidden" value="6" id="subInitialSpe2">
								<input type="hidden" value="0" id="subNumberSpe2">
								<select class="form-control  inputCard inputCard-border" id="spe2Text"  name="spe2_id">{$spes}</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="guildText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$guildText}:</label>
							<div class="col-12 col-sm-4 col-md-3 col-lg-3">
								<select class="form-control inputCard inputCard-border" id="guildText" name="guild_id">{$guilds}</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="genderText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$genderText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="genderText" name="gender_id">{$genders}</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="levelText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$levelText}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="levelText" placeholder="{$levelText}" name="char_level" value="{$char_level|escape}">
								<div class="form-control-feedback text-danger">{validate id="level" message="$levelError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="ilvlText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$ilvlText}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="ilvlText" placeholder="{$ilvlText}" name="ilvl" value="{$ilvl|escape}">
								<div class="form-control-feedback text-danger">{validate id="ilvl" message="$ilvlError"}</div>
							</div>
						</div>
						<div class="content--divider"></div>
						{$attributes}
					</div>
					<div class="card-block sectionCard--footer text-center">
						<button type="submit" class="btn btn--sectionFooter btn--bg" value="{$submit}">{$submit}</button>
						<button type="reset" class="btn btn--sectionFooter btn--bg" value="{$reset}">{$reset}</button>
					</div>
				</div>
			</form>
			<!-- this image is used for the loading of the javascript only -->
			<img class="hidden-xs-up" src="{$site_url}/templates/{$template}/images/pixel.png" onload="setupItems('subInitial', 'race_id', 'class_id' )" alt="">
			<img class="hidden-xs-up" src="{$site_url}/templates/{$template}/images/pixel.png" onload="setupItemsSpe1('subInitialSpe1', 'class_id', 'spe1_id' )" alt="">
			<img class="hidden-xs-up" src="{$site_url}/templates/{$template}/images/pixel.png" onload="setupItemsSpe2('subInitialSpe2', 'class_id', 'spe2_id' )" alt="">
		</div>
	</div>
</div>