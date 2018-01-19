<div class="container-fluid" id="sectionConfiguration">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_configuration">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$game_header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row">
							<label for="gaGame_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$gaGame_text}:</label>
							<div class="col-6 col-sm-4 col-md-3">
								<select class="form-control inputCard inputCard-border" id="gaGame_text" name="pConfig_game">
									{$games}
								</select>
							</div>
							<div class="col-4 col-sm-2 col-md-2">
								{$installGame_text}
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="gaMinLvl_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$gaMinLvl_text}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="gaMinLvl_text" placeholder="{$gaMinLvl_text}" name="pConfig_min_level" value="{$pConfig_min_level|escape}">
								<div class="form-control-feedback text-danger">{validate id="min_level" message="$minLevelError"}</div>
							</div>
						</div>	
						<div class="form-group row form-group-row">
							<label for="gaMaxLvl_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$gaMaxLvl_text}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="gaMaxLvl_text" placeholder="{$gaMaxLvl_text}" name="pConfig_max_level" value="{$pConfig_max_level|escape}">
								<div class="form-control-feedback text-danger">{validate id="max_level" message="$maxLevelError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="gaMinRaiders_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$gaMinRaiders_text}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="gaMinRaiders_text" placeholder="{$gaMinRaiders_text}" name="pConfig_min_raiders" value="{$pConfig_min_raiders|escape}">
								<div class="form-control-feedback text-danger">{validate id="min_raiders" message="$minRaidersError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="gaMaxRaiders_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$gaMaxRaiders_text}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="gaMaxRaiders_text" placeholder="{$gaMaxRaiders_text}" name="pConfig_max_raiders" value="{$pConfig_max_raiders|escape}">
								<div class="form-control-feedback text-danger">{validate id="max_raiders" message="$maxRaidersError"}</div>
							</div>
						</div>
					</div>
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$site_header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row">
							<label for="siLanguage_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siLanguage_text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="siLanguage_text" name="pConfig_language">
									{$language}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siTemplate_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siTemplate_text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="siTemplate_text" name="pConfig_template">
									{$templates}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siFirstDayOfWeek_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siFirstDayOfWeek_text}:</label>
							<div class="col-6 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="siFirstDayOfWeek_text" name="pConfig_first_day_of_week">
									{$firstdayofweek}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siDateFormat_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siDateFormat_text}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="siDateFormat_text" placeholder="{$siDateFormat_text}" name="pConfig_date_format" value="{$pConfig_date_format|escape}">
								<div class="form-control-feedback text-danger">{validate id="date_format" message="$dateError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siTimeFormat_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siTimeFormat_text}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="siTimeFormat_text" placeholder="{$siTimeFormat_text}" name="pConfig_time_format" value="{$pConfig_time_format|escape}">
								<div class="form-control-feedback text-danger">{validate id="time_format" message="$timeError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siTimezone_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siTimezone_text}:</label>
							<div class="col-6 col-sm-4 col-md-3">
								<select class="form-control inputCard inputCard-border" id="siTimezone_text" name="pConfig_timezone">
									{$timezone}
								</select>
							</div>
							<div class="offset-1 offset-sm-6 offset-md-4 col-5 col-sm-6 col-md-8">
								<p class="inputCard--formHelp">{$siCurrentTime} GT</p>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siDst_text" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siDst_text}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="siDst_text" name="pConfig_dst" value="100" {if $pConfig_dst}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>		
							</div>
							<div class="offset-7 offset-sm-6 offset-md-4 col-5 col-sm-6 col-md-8">
								<p class="inputCard--formHelp">{$siSetTime} {$siLocalText}</p>								
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siAdmin_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siAdmin_text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="siAdmin_text" placeholder="{$siAdmin_text}" name="pConfig_admin_name" value="{$pConfig_admin_name|escape}">
								<div class="form-control-feedback text-danger">{validate id="admin" message="$adminError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="siAdminEmail_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siAdminEmail_text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="siAdminEmail_text" placeholder="{$siAdminEmail_text}" name="pConfig_admin_email" value="{$pConfig_admin_email|escape}">
								<div class="form-control-feedback text-danger">{validate id="admin_email" message="$adminEmailError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="siURL_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$siURL_text}:</label>
							<div class="col-12 col-sm-6 col-md-5">
								<input type="text" class="form-control  inputCard inputCard-border" id="siURL_text" placeholder="{$siURL_text}" name="pConfig_site_url" value="{$pConfig_site_url|escape}">
							</div>
						</div>
					</div>
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$misc_header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row">
							<label for="miDefaultGroup_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$miDefaultGroup_text}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="miDefaultGroup_text" name="pConfig_default_group">
									{$group}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="miAnon_text" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$miAnon_text}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="miAnon_text" name="pConfig_allow_anonymous" value="1" {if $pConfig_allow_anonymous}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="miQueue_text" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$miQueue_text}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="miQueue_text" name="pConfig_auto_queue" value="1" {if $pConfig_auto_queue}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="miDebug_text" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$miDebug_text}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="miDebug_text" name="pConfig_debug_mode" value="1" {if $pConfig_debug_mode}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="miDisable_text" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$miDisable_text}:</label>
							<div class="col-1 col-sm-4 col-md-3">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="miDisable_text" name="pConfig_disable_site" value="1" {if $pConfig_disable_site}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="miReport_text" class="col-12  col-sm-6 col-md-4 col-form-label inputCard--Label">{$miReport_text}:</label>
							<div class="col-4  col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="miReport_text" placeholder="{$miReport_text}" name="pConfig_report_max" value="{$pConfig_report_max|escape}">
								<div class="form-control-feedback text-danger">{validate id="report_max" message="$reportError"}</div>
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