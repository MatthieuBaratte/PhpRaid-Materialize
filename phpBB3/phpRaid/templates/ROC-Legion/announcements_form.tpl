<div class="container" id="containerAnnoucementsForm">	
	<form method="post" action="index.php?option=com_announcements&task={$task}">
		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				{$header}
			</div>
			<div class="panel-content color-br-panel">
				{validate id="title" message="$titleError" assign="errorTitle"}
				{validate id="message" message="$messageError" assign="errorMessage"}
				<div class="row"> 
					<div class="input-field col s12 m6">
						<input type="text" value="{$announcement_title|escape}" id="titleText" name="announcement_title" class="validate {if isset($errorTitle)}{$classError}{/if}" {if isset($errorTitle)}{$propError}{/if}>
						<label for="titleText" class="color-theme" data-error="{if isset($errorTitle)}{$titleError}{/if}">{$titleText}</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<textarea id="messageText" name="announcement_msg" class="materialize-textarea validate {if isset($errorMessage)}{$classError}{/if}" {if isset($errorMessage)}{$propError}{/if}>{$announcement_msg|escape}</textarea>
						<label for="messageText" class="color-theme" data-error="{if isset($errorMessage)}{$messageError}{/if}"}">{$messageText}</label>
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