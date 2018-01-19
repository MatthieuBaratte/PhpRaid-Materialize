<div class="container" id="containerCharactersForm">	
	{$scripts}
	<form name="character_new" method="post" action="index.php?option=com_characters&amp;task={$task}">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="card-header sectionCard--header">
				<div class="panel-header center-align color-bg-header color-theme">
					{$header}
				</div>
			</div>
			<div class="panel-content color-br-panel">
				{validate id="name" message="$nameError" assign="errorName"}
				{validate id="race" message="$raceError" assign="errorRace"}
				{validate id="class" message="$classError" assign="errorClass"}
				{validate id="level" message="$levelError" assign="errorLevel"}
				{validate id="ilvl" message="$ilvlError" assign="errorIlvl"}
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$char_name|escape}" id="nameText" name="char_name" class="validate {if isset($errorName)}{$materializedClassError}{/if}" {if isset($errorName)}{$materializedPropError}{/if}>
						<label for="nameText" class="color-theme" data-error="{if isset($errorName)}{$nameError}{/if}">{$nameText}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="raceText" name="race_id" onChange="addItem('race_id','class_id');addItemSpe1('class_id','spe1_id');addItemSpe2('class_id','spe2_id');update_select()" class="validate {if isset($errorRace)}{$materializedClassError}{/if}" {if isset($errorRace)}{$materializedPropError}{/if}>{$races}</select>
						<label for="raceText" class="color-theme" data-error="{if isset($errorRace)}{$raceError}{/if}">{$raceText}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" value="4" id="subInitial">
						<input type="hidden" value="0" id="subNumber">
						<select id="classText" name="class_id" onChange="addItemSpe1('class_id','spe1_id');addItemSpe2('class_id','spe2_id');update_select()" class="validate {if isset($errorClass)}{$materializedClassError}{/if}" {if isset($errorClass)}{$materializedPropError}{/if}>{$classes}</select>
						<label for="classText" class="color-theme" data-error="{if isset($errorClass)}{$classError}{/if}">{$classText}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" value="5" id="subInitialSpe1">
						<input type="hidden" value="0" id="subNumberSpe1">
						<select id="spe1Text" name="spe1_id">{$spes}</select>
						<label for="spe1Text" class="color-theme">{$spe1Text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="hidden" value="6" id="subInitialSpe2">
						<input type="hidden" value="0" id="subNumberSpe2">
						<select id="spe2Text" name="spe2_id">{$spes}</select>
						<label for="spe2Text" class="color-theme">{$spe2Text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="guildText" name="guild_id">{$guilds}</select>
						<label for="guildText" class="color-theme">{$guildText}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="genderText" name="gender_id">{$genders}</select>
						<label for="genderText" class="color-theme">{$genderText}</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$char_level|escape}" id="levelText" name="char_level" class="validate {if isset($errorLevel)}{$materializedClassError}{/if}" {if isset($errorLevel)}{$materializedPropError}{/if}>
						<label for="levelText" class="color-theme" data-error="{if isset($errorLevel)}{$levelError}{/if}">{$levelText}</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$ilvl|escape}" id="ilvlText" name="ilvl" class="validate {if isset($errorIlvl)}{$materializedClassError}{/if}" {if isset($errorIlvl)}{$materializedPropError}{/if}>
						<label for="nameText" class="color-theme" data-error="{if isset($errorIlvl)}{$ilvlError}{/if}">{$ilvlText}</label>
					</div>
				</div>
				{$attributes}
			</div>
			<div class="panel-footer center-align color-bg-footer">
				<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="{$submit}">{$submit}<i class="material-icons right">send</i></button>
				<button type="reset" class="btn color-btn-theme waves-effect waves-light" value="{$reset}">{$reset}<i class="material-icons right">replay</i></button>
			</div>
		</div>
	</form>
	<!-- this image is used for the loading of the javascript only -->
	<img class="hide" src="{$site_url}/templates/{$template}/images/pixel.png" onload="setupItems('subInitial','race_id','class_id')" alt="">
	<img class="hide" src="{$site_url}/templates/{$template}/images/pixel.png" onload="setupItemsSpe1('subInitialSpe1','class_id','spe1_id')" alt="">
	<img class="hide" src="{$site_url}/templates/{$template}/images/pixel.png" onload="setupItemsSpe2('subInitialSpe2','class_id','spe2_id')" alt="">
</div>