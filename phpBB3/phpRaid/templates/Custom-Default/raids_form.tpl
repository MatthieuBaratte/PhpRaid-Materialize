<div class="container-fluid" id="sectionRaidsForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form name="new_raid" method="post" action="index.php?option=com_raids&amp;task={$task}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$generic_header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row">
							<label for="templateText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$templateText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="templateText" name="raid_template" onchange="MM_jumpMenu('self',this,0)">
									{$templates}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="locationText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$locationText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="locationText" placeholder="{$locationText}" name="location" value="{$location|escape}">
								<div class="form-control-feedback text-danger">{validate id="location" message="$locationError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="date" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$dateText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control  inputCard inputCard-border" id="date" placeholder="{$dateText}" name="date" value="{$date|escape}">
								<div class="form-control-feedback text-danger">{validate id="date" message="$dateError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="invite_time_hour" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$inviteText}:</label>
							<div class="col-4 col-sm-2 col-md-1 pa-0 mr-1">
								<select class="form-control  inputCard inputCard-border" id="invite_time_hour" name="invite_time_hour">
									<option value="00" {if $invite_time_hour == '00'} selected{/if}>00</option>
									<option value="01" {if $invite_time_hour == '01'} selected{/if}>01</option>
									<option value="02" {if $invite_time_hour == '02'} selected{/if}>02</option>
									<option value="03" {if $invite_time_hour == '03'} selected{/if}>03</option>
									<option value="04" {if $invite_time_hour == '04'} selected{/if}>04</option>
									<option value="05" {if $invite_time_hour == '05'} selected{/if}>05</option>
									<option value="06" {if $invite_time_hour == '06'} selected{/if}>06</option>
									<option value="07" {if $invite_time_hour == '07'} selected{/if}>07</option>
									<option value="08" {if $invite_time_hour == '08'} selected{/if}>08</option>
									<option value="09" {if $invite_time_hour == '09'} selected{/if}>09</option>
									<option value="10" {if $invite_time_hour == '10'} selected{/if}>10</option>
									<option value="11" {if $invite_time_hour == '11'} selected{/if}>11</option>
									<option value="12" {if $invite_time_hour == '12'} selected{/if}>12</option>
									<option value="13" {if $invite_time_hour == '13'} selected{/if}>13</option>
									<option value="14" {if $invite_time_hour == '14'} selected{/if}>14</option>
									<option value="15" {if $invite_time_hour == '15'} selected{/if}>15</option>
									<option value="16" {if $invite_time_hour == '16'} selected{/if}>16</option>
									<option value="17" {if $invite_time_hour == '17'} selected{/if}>17</option>
									<option value="18" {if $invite_time_hour == '18'} selected{/if}>18</option>
									<option value="19" {if $invite_time_hour == '19'} selected{/if}>19</option>
									<option value="20" {if $invite_time_hour == '20'} selected{/if}>20</option>
									<option value="21" {if $invite_time_hour == '21'} selected{/if}>21</option>
									<option value="22" {if $invite_time_hour == '22'} selected{/if}>22</option>
									<option value="23" {if $invite_time_hour == '23'} selected{/if}>23</option>
								</select>
							</div>
							<div class="col-4 col-sm-2 col-md-1 pa-0 mr-1">
								<select class="form-control  inputCard inputCard-border" id="invite_time_minute" name="invite_time_minute">
									<option value="00" {if $invite_time_minute == '00'} selected{/if}>00</option>
									<option value="05" {if $invite_time_minute == '05'} selected{/if}>05</option>
									<option value="10" {if $invite_time_minute == '10'} selected{/if}>10</option>
									<option value="15" {if $invite_time_minute == '15'} selected{/if}>15</option>
									<option value="20" {if $invite_time_minute == '20'} selected{/if}>20</option>
									<option value="25" {if $invite_time_minute == '25'} selected{/if}>25</option>
									<option value="30" {if $invite_time_minute == '30'} selected{/if}>30</option>
									<option value="35" {if $invite_time_minute == '35'} selected{/if}>35</option>
									<option value="40" {if $invite_time_minute == '40'} selected{/if}>40</option>
									<option value="45" {if $invite_time_minute == '45'} selected{/if}>45</option>
									<option value="50" {if $invite_time_minute == '50'} selected{/if}>50</option>
									<option value="55" {if $invite_time_minute == '55'} selected{/if}>55</option>
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="start_time_hour" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$startText}:</label>
							<div class="col-4 col-sm-2 col-md-1 pa-0 mr-1">
								<select class="form-control  inputCard inputCard-border" id="start_time_hour" name="start_time_hour">
									<option value="00" {if $start_time_hour == '00'} selected{/if}>00</option>
									<option value="01" {if $start_time_hour == '01'} selected{/if}>01</option>
									<option value="02" {if $start_time_hour == '02'} selected{/if}>02</option>
									<option value="03" {if $start_time_hour == '03'} selected{/if}>03</option>
									<option value="04" {if $start_time_hour == '04'} selected{/if}>04</option>
									<option value="05" {if $start_time_hour == '05'} selected{/if}>05</option>
									<option value="06" {if $start_time_hour == '06'} selected{/if}>06</option>
									<option value="07" {if $start_time_hour == '07'} selected{/if}>07</option>
									<option value="08" {if $start_time_hour == '08'} selected{/if}>08</option>
									<option value="09" {if $start_time_hour == '09'} selected{/if}>09</option>
									<option value="10" {if $start_time_hour == '10'} selected{/if}>10</option>
									<option value="11" {if $start_time_hour == '11'} selected{/if}>11</option>
									<option value="12" {if $start_time_hour == '12'} selected{/if}>12</option>
									<option value="13" {if $start_time_hour == '13'} selected{/if}>13</option>
									<option value="14" {if $start_time_hour == '14'} selected{/if}>14</option>
									<option value="15" {if $start_time_hour == '15'} selected{/if}>15</option>
									<option value="16" {if $start_time_hour == '16'} selected{/if}>16</option>
									<option value="17" {if $start_time_hour == '17'} selected{/if}>17</option>
									<option value="18" {if $start_time_hour == '18'} selected{/if}>18</option>
									<option value="19" {if $start_time_hour == '19'} selected{/if}>19</option>
									<option value="20" {if $start_time_hour == '20'} selected{/if}>20</option>
									<option value="21" {if $start_time_hour == '21'} selected{/if}>21</option>
									<option value="22" {if $start_time_hour == '22'} selected{/if}>22</option>
									<option value="23" {if $start_time_hour == '23'} selected{/if}>23</option>
								</select>
							</div>
							<div class="col-4 col-sm-2 col-md-1 pa-0 mr-1">
								<select class="form-control  inputCard inputCard-border" id="start_time_minute" name="start_time_minute">
									<option value="00" {if $start_time_minute == '00'} selected{/if}>00</option>
									<option value="05" {if $start_time_minute == '05'} selected{/if}>05</option>
									<option value="10" {if $start_time_minute == '10'} selected{/if}>10</option>
									<option value="15" {if $start_time_minute == '15'} selected{/if}>15</option>
									<option value="20" {if $start_time_minute == '20'} selected{/if}>20</option>
									<option value="25" {if $start_time_minute == '25'} selected{/if}>25</option>
									<option value="30" {if $start_time_minute == '30'} selected{/if}>30</option>
									<option value="35" {if $start_time_minute == '35'} selected{/if}>35</option>
									<option value="40" {if $start_time_minute == '40'} selected{/if}>40</option>
									<option value="45" {if $start_time_minute == '45'} selected{/if}>45</option>
									<option value="50" {if $start_time_minute == '50'} selected{/if}>50</option>
									<option value="55" {if $start_time_minute == '55'} selected{/if}>55</option>
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="freezeText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$freezeText}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<select class="form-control  inputCard inputCard-border" id="freezeText" name="freeze_time">
									<option value="00" {if $freeze_time == '00'} selected{/if}>00</option>
									<option value="01" {if $freeze_time == '01'} selected{/if}>01</option>
									<option value="02" {if $freeze_time == '02'} selected{/if}>02</option>
									<option value="03" {if $freeze_time == '03'} selected{/if}>03</option>
									<option value="04" {if $freeze_time == '04'} selected{/if}>04</option>
									<option value="05" {if $freeze_time == '05'} selected{/if}>05</option>
									<option value="06" {if $freeze_time == '06'} selected{/if}>06</option>
									<option value="07" {if $freeze_time == '07'} selected{/if}>07</option>
									<option value="08" {if $freeze_time == '08'} selected{/if}>08</option>
									<option value="09" {if $freeze_time == '09'} selected{/if}>09</option>
									<option value="10" {if $freeze_time == '10'} selected{/if}>10</option>
									<option value="11" {if $freeze_time == '11'} selected{/if}>11</option>
									<option value="12" {if $freeze_time == '12'} selected{/if}>12</option>
									<option value="13" {if $freeze_time == '13'} selected{/if}>13</option>
									<option value="14" {if $freeze_time == '14'} selected{/if}>14</option>
									<option value="15" {if $freeze_time == '15'} selected{/if}>15</option>
									<option value="16" {if $freeze_time == '16'} selected{/if}>16</option>
									<option value="17" {if $freeze_time == '17'} selected{/if}>17</option>
									<option value="18" {if $freeze_time == '18'} selected{/if}>18</option>
									<option value="19" {if $freeze_time == '19'} selected{/if}>19</option>
									<option value="20" {if $freeze_time == '20'} selected{/if}>20</option>
									<option value="21" {if $freeze_time == '21'} selected{/if}>21</option>
									<option value="22" {if $freeze_time == '22'} selected{/if}>22</option>
									<option value="23" {if $freeze_time == '23'} selected{/if}>23</option>
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="title" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$titleText}:</label>
							<div class="col-12 col-sm-6 col-md-5">
								<input type="text" class="form-control  inputCard inputCard-border" id="title" placeholder="{$titleText}" name="title" value="{$title|escape}">
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="descriptionText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$descriptionText}:</label>
							<div class="col-12 col-sm-6 col-md-5">
								<textarea type="text" class="form-control  inputCard inputCard-border" rows="10" id="descriptionText" placeholder="{$descriptionText}" name="description">{$description|escape}</textarea>
								<div class="form-control-feedback text-danger">{validate id="description" message="$descriptionError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="iconText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$iconText}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<select class="form-control  inputCard inputCard-border" id="iconText" name="icon_name">
									{$icons}
								</select>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="minText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$minText}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="minText" placeholder="{$minText} minimum" name="minimum_level" value="{$minimum_level|escape}">
								<div class="form-control-feedback text-danger">{validate id="minimum_level" message="$minError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="maxText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$maxText}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="maxText" placeholder="{$maxText} maximum" name="maximum_level" value="{$maximum_level|escape}">
								<div class="form-control-feedback text-danger">{validate id="maximum_level" message="$maxError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="raidersText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$raidersText}:</label>
							<div class="col-4 col-sm-2 col-md-1">
								<input type="text" class="form-control  inputCard inputCard-border" id="raidersText" placeholder="{$raidersText}" name="maximum" value="{$maximum|escape}">
								<div class="form-control-feedback text-danger">{validate id="maximum" message="$maximumError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="saveText" class="col-9 col-sm-6 col-md-4 col-form-label inputCard--Label">{$saveText}:</label>
							<div class="col-1 col-sm-2 col-md-1">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="saveText" name="save" value="1" {if $save}checked="checked"{/if} aria-label="...">
									<span class="custom-control-indicator custom-checkcheckbox custom-checkcheckbox--border"></span>
								</label>								
							</div>
						</div>
						<div class="content--divider"></div>
						{$class_limits}						
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