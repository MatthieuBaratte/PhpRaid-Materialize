<div class="container" id="containerConfiguration">	
	<form method="post" action="index.php?option=com_configuration">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				{$game_header}
			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="gaGame_text" name="pConfig_game">{$games}</select>
						<label for="gaGame_text" class="color-theme">{$gaGame_text}</label>
					</div>
					<div class="col s12 m2">
						<a class="btn color-btn-theme waves-effect waves-light" href={$installGame_text}><i class="material-icons">file_upload</i> <i class="material-icons">fiber_new</i></a>
					</div>
				</div>
				</br>

				{validate id="min_level" message="$minLevelError" assign="errorMinLevel"}
				{validate id="max_level" message="$maxLevelError" assign="errorMaxLevel"}
				{validate id="min_raiders" message="$minRaidersError" assign="errorMinRaiders"}
				{validate id="max_raiders" message="$maxRaidersError" assign="errorMaxRaiders"}
				{validate id="date_format" message="$dateError" assign="errorDate"}
				{validate id="time_format" message="$timeError" assign="errorTime"}
				{validate id="admin" message="$adminError" assign="errorAdmin"}
				{validate id="admin_email" message="$adminEmailError" assign="errorAdminEmail"}
				{validate id="report_max" message="$reportError" assign="errorReport"}

				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_min_level|escape}" id="gaMinLvl_text" name="pConfig_min_level" class="validate {if isset($errorMinLevel)}{$classError}{/if}" {if isset($errorMinLevel)}{$propError}{/if}>
						<label for="gaMinLvl_text" class="color-theme" data-error="{if isset($errorMinLevel)}{$minLevelError}{/if}">{$gaMinLvl_text}</label>	
					</div>
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_max_level|escape}" id="gaMaxLvl_text" name="pConfig_max_level" class="validate {if isset($errorMaxLevel)}{$classError}{/if}" {if isset($errorMaxLevel)}{$propError}{/if}>
						<label for="gaMaxLvl_text" class="color-theme" data-error="{if isset($errorMaxLevel)}{$maxLevelError}{/if}">{$gaMaxLvl_text}</label>	
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_min_raiders|escape}" id="gaMinRaiders_text" name="pConfig_min_raiders" class="validate {if isset($errorMinRaiders)}{$classError}{/if}" {if isset($errorMinRaiders)}{$propError}{/if}>
						<label for="gaMinRaiders_text" class="color-theme" data-error="{if isset($errorMinRaiders)}{$minRaidersError}{/if}">{$gaMinRaiders_text}</label>	
					</div>
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_max_raiders|escape}" id="gaMaxRaiders_text" name="pConfig_max_raiders" class="validate {if isset($errorMaxRaiders)}{$classError}{/if}" {if isset($errorMaxRaiders)}{$propError}{/if}>
						<label for="gaMaxRaiders_text" class="color-theme" data-error="{if isset($errorMaxRaiders)}{$maxRaidersError}{/if}">{$gaMaxRaiders_text}</label>	
					</div>
				</div>
			</div>
			<div class="panel-header center-align color-bg-header color-theme">
				{$site_header}
			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="siLanguage_text" name="pConfig_language">{$language}</select>
						<label for="siLanguage_text" class="color-theme">{$siLanguage_text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="siTemplate_text" name="pConfig_template">{$templates}</select>
						<label for="siTemplate_text" class="color-theme">{$siTemplate_text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="siFirstDayOfWeek_text" name="pConfig_first_day_of_week">{$firstdayofweek}</select>
						<label for="siFirstDayOfWeek_text" class="color-theme">{$siFirstDayOfWeek_text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_date_format|escape}" id="siDateFormat_text" name="pConfig_date_format" class="validate {if isset($errorDate)}{$classError}{/if}" {if isset($errorDate)}{$propError}{/if}>
						<label for="siDateFormat_text" class="color-theme" data-error="{if isset($errorDate)}{$dateError}{/if}">{$siDateFormat_text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_time_format|escape}" id="siTimeFormat_text" name="pConfig_time_format" class="validate {if isset($errorTime)}{$classError}{/if}" {if isset($errorTime)}{$propError}{/if}>
						<label for="siTimeFormat_text" class="color-theme" data-error="{if isset($errorTime)}{$timeError}{/if}">{$siTimeFormat_text}</label>
					</div>
					<div class="input-field col s9 m4">
						<select id="siTimezone_text" name="pConfig_timezone">{$timezone}</select>
						<label for="siTimezone_text" class="color-theme">{$siTimezone_text}</label>
					</div>
					<div class="input-field col s3 m2">
						<label>{$siCurrentTime} GT</label>
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="100" id="siDst_text" name="pConfig_dst" class="filled-in" {if $pConfig_dst}checked="checked"{/if}/>
						<label for="siDst_text" class="color-theme">{$siDst_text}</label>	
						<label for="siDst_text"> [{$siSetTime} {$siLocalText}]</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_admin_name|escape}" id="siAdmin_text" name="pConfig_admin_name" class="validate {if isset($errorAdmin)}{$classError}{/if}" {if isset($errorAdmin)}{$propError}{/if}>
						<label for="siAdmin_text" class="color-theme" data-error="{if isset($errorAdmin)}{$adminError}{/if}">{$siAdmin_text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_admin_email|escape}" id="siAdminEmail_text" name="pConfig_admin_email" class="validate {if isset($errorAdminEmail)}{$classError}{/if}" {if isset($errorAdminEmail)}{$propError}{/if}>
						<label for="siAdminEmail_text" class="color-theme" data-error="{if isset($errorAdminEmail)}{$adminEmailError}{/if}">{$siAdminEmail_text}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="{$siURL_text|escape}" id="siURL_text" name="pConfig_site_url">
						<label for="siURL_text" class="color-theme">{$siAdminEmail_text}</label>
					</div>
				</div>
			</div>
			<div class="panel-header center-align color-bg-header color-theme">
				{$misc_header}
			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="miDefaultGroup_text" name="pConfig_default_group">{$group}</select>
						<label for="miDefaultGroup_text" class="color-theme">{$miDefaultGroup_text}</label>
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miAnon_text" name="pConfig_allow_anonymous" class="filled-in" {if $pConfig_allow_anonymous}checked="checked"{/if}/>
						<label for="miAnon_text" class="color-theme">{$miAnon_text}</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miQueue_text" name="pConfig_auto_queue" class="filled-in" {if $pConfig_auto_queue}checked="checked"{/if}/>
						<label for="miQueue_text" class="color-theme">{$miQueue_text}</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miDebug_text" name="pConfig_debug_mode" class="filled-in" {if $pConfig_debug_mode}checked="checked"{/if}/>
						<label for="miDebug_text" class="color-theme">{$miDebug_text}</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="miDisable_text" name="pConfig_disable_site" class="filled-in" {if $pConfig_disable_site}checked="checked"{/if}/>
						<label for="miDisable_text" class="color-theme">{$miDisable_text}</label>	
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input type="text" value="{$pConfig_report_max|escape}" id="miReport_text" name="pConfig_report_max" class="validate {if isset($errorReport)}{$classError}{/if}" {if isset($errorReport)}{$propError}{/if}>
						<label for="miReport_text" class="color-theme" data-error="{if isset($errorReport)}{$reportError}{/if}">{$miReport_text}</label>
					</div>
				</div>
			</div>
			<div class="panel-footer center-align color-bg-footer">
				<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="{$submit}">{$submit}<i class="material-icons right">send</i></button>
				<button type="reset" class="btn color-btn-theme waves-effect waves-light" value="{$reset}">{$reset}<i class="material-icons right">replay</i></button>
			</div>
		</div>	
	</form>
</div>