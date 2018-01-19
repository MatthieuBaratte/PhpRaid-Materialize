<div class="container" id="containerRaidsForm">	
	<form name="new_raid" method="post" action="index.php?option=com_raids&amp;task={$task}">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				{$generic_header}
			</div>
			<div class="panel-content color-br-panel">
				{validate id="location" message="$locationError" assign="errorLocation"}
				{validate id="date" message="$dateError" assign="errorDate"}
				{validate id="title" message="$titleError" assign="errorTitle"}
				{validate id="description" message="$descriptionError" assign="errorDescription"}
				{validate id="minimum_level" message="$minError" assign="errorMin"}
				{validate id="maximum_level" message="$maxError" assign="errorMax"}
				{validate id="maximum" message="$maximumError" assign="errorMaximum"} 
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="templateText" name="raid_template" onchange="MM_jumpMenu('self',this,0)">{$templates}</select>
						<label for="templateText" class="color-theme">{$templateText}</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$location|escape}" id="locationText" name="location" class="validate {if isset($errorLocation)}{$classError}{/if}" {if isset($errorLocation)}{$propError}{/if}>
						<label for="locationText" class="color-theme" data-error="{if isset($errorLocation)}{$locationError}{/if}">{$locationText}</label>	
					</div>
				</div>
				<div class="row" id="date_root"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$date|escape}" id="date" name="date" class="datepicker {if isset($errorDate)}{'validate '|cat:$classError}{/if}" {if isset($errorDate)}{$propError}{/if}>
						<label for="date" class="color-theme" data-error="{if isset($errorDate)}{$dateError}{/if}">{$dateText}</label>	
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m6">
						<select id="invite_time_hour" name="invite_time_hour">
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
						<label for="invite_time_hour" class="color-theme">{$inviteHour}</label>
					</div>
					<div class="input-field col s6 m6">
						<select id="invite_time_minute" name="invite_time_minute">
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
						<label for="invite_time_minute" class="color-theme">{$inviteMin}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m6">
						<select id="start_time_hour" name="start_time_hour">
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
						<label for="start_time_hour" class="color-theme">{$startHour}</label>
					</div>
					<div class="input-field col s6 m6">
						<select id="start_time_minute" name="start_time_minute">
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
						<label for="start_time_minute" class="color-theme">{$startMin}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select id="freeze_time" name="freeze_time">
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
						<label for="freeze_time" class="color-theme">{$freezeText}</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$title|escape}" id="title" name="title" class="validate  {if isset($errorTitle)}{$classError}{/if}" {if isset($errorTitle)}{$propError}{/if}>
						<label for="title" class="color-theme" data-error="{if isset($errorTitle)}{$titleError}{/if}">{$titleText}</label>	
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<textarea type="text" id="descriptionText" name="description" class="materialize-textarea validate {if isset($errorDescription)}{$classError}{/if}" {if isset($errorDescription)}{$propError}{/if}>{$description|escape}</textarea>
						<label for="descriptionText" class="color-theme" data-error="{if isset($errorDescription)}{$descriptionError}{/if}"}">{$descriptionText}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<select class="icons" id="iconText" name="icon_name">{$icons}</select>
						<label for="iconText" class="color-theme">{$iconText}</label>
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$minimum_level|escape}" id="minText" name="minimum_level" class="validate {if isset($errorMin)}{$classError}{/if}" {if isset($errorMin)}{$propError}{/if}>
						<label for="minText" class="color-theme" data-error="{if isset($errorMin)}{$minError}{/if}">{$minText}</label>	
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$maximum_level|escape}" id="maxText" name="maximum_level" class="validate {if isset($errorMax)}{$classError}{/if}" {if isset($errorMax)}{$propError}{/if}>
						<label for="maxText" class="color-theme" data-error="{if isset($errorMax)}{$maxError}{/if}">{$maxText}</label>	
					</div>
				</div>
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$maximum|escape}" id="raidersText" name="maximum" class="validate {if isset($errorMaximum)}{$classError}{/if}" {if isset($errorMaximum)}{$propError}{/if}>
						<label for="raidersText" class="color-theme" data-error="{if isset($errorMaximum)}{$maximumError}{/if}">{$raidersText}</label>	
					</div>
				</div>
				<div class="row form-checkbox"> 
					<div class="col s12 m6">
						<input type="checkbox" value="1" id="saveText" name="save" class="filled-in" {if $save}checked="checked"{/if}/>
						<label for="saveText" class="color-theme">{$saveText}</label>	
					</div>
				</div>
				{$class_limits}						
			</div>	
			<div class="panel-footer center-align color-bg-footer">
				<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="{$submit}">{$submit}<i class="material-icons right">send</i></button>
				<button type="reset" class="btn color-btn-theme waves-effect waves-light" value="{$reset}">{$reset}<i class="material-icons right">replay</i></button>
			</div>
		</div>
	</form>
</div>