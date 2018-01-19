<div class="container" id="containerRaidsForm">		
	<form method="post" action="index.php?option=com_backups">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				{$header}
			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					<div class="input-field col s12 m6">
						<select multiple id="chooseTables" name="tables[]">
							{foreach name=backupTableNames from=$tables item=table}
								<option value="{$table}">{$table}</option>
							{/foreach}
						</select>
						<label for="chooseTables" class="color-theme">{$chooseTables}</label>
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