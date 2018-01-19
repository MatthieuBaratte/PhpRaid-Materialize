<div class="container" id="containerConfigurationGame">	
	<div class="panel color-bg-menu color-br-panel z-depth-4">
		<div class="panel-header center-align color-bg-header color-theme">
			{$header}
		</div>
		{if isset($zip_support)}
			<form method="post" enctype="multipart/form-data" action="index.php?option=com_configuration&task={$task}">
				<div class="panel-content color-br-panel">
					<div class="row">
						<div class="col s12">
							{$game}
						</div>
					</div>
					<div class="row">
						<div class="file-field input-field">
							<div class="file-path-wrapper col s12 m6">
								<input type="text" id="fileName_text" name="game_file" class="file-path validate" placeholder="{$fileName_text}">
							</div>
							<div class="btn color-btn-theme waves-effect waves-light col s12 m2">
								<i class="material-icons">folder_open</i>
								<input type="file">
							</div>
						</div>
					</div>						
				</div>
				<div class="panel-footer center-align color-bg-footer">
					<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="{$submit}">{$submit}<i class="material-icons right">send</i></button>
					<button type="reset" class="btn color-btn-theme waves-effect waves-light" value="{$reset}">{$reset}<i class="material-icons right">replay</i></button>
				</div>
			</form>
		{else}
			<div class="panel-content color-br-panel">
				{if isset($zip_disabled)}
					<div class="row">{$zip_disabled}</div>
				{/if}
				<div class="row">{$manual_installation}</div>
			</div>
			<div class="panel-footer center-align color-bg-footer">
				&nbsp;
			</div>
		{/if}
	</div>
</div>