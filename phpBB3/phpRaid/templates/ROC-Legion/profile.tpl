<div class="container" id="containerProfil">	
	<div class="panel color-bg-menu color-br-panel z-depth-4">
		<div class="panel-header center-align color-bg-header color-theme">
			{$header}
		</div>
		{if $authentype!='phpbb3'}
			<form method="post" action="index.php?option=com_profile">
				<div class="panel-content color-br-panel">
					<div class="row">
						<div class="input-field col s12 m6">
      						<input disabled type="text" value="{$user_email|escape}" id="email" name="user_email">
      						<label for="email" class="color-theme">{$emailText}</label>
    					</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
      						<input type="password" value="{$new_password|escape}" id="newPasswordText" name="new_password" class="validate {$materializedClassErrorConfirm}" {$materializedPropErrorConfirm}>
      						<label for="newPasswordText" class="color-theme" data-error="{$confirmPasswordError}">{$newPasswordText}</label>
    					</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
      						<input type="password" value="{$confirm_password|escape}" id="confirmPasswordText" name="confirm_password" class="validate {$materializedClassErrorConfirm}" {$materializedPropErrorConfirm}>
      						<label for="confirmPasswordText" class="color-theme" data-error="{$confirmPasswordError}{$flagAuthentificationType}">{$confirmPasswordText}</label>
    					</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
      						<input type="password" value="{$enter_password|escape}" id="enterPasswordText" name="enter_password" class="validate {$materializedClassErrorEnter}" {$materializedPropErrorEnter}>
      						<label for="enterPasswordText" class="color-theme" data-error="{$enterPasswordError}">{$enterPasswordText}</label>
    					</div>
					</div>	
				</div>
				<div class="panel-footer center-align color-bg-footer">
					<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="{$submit}">{$submit}<i class="material-icons right">send</i></button>
					<button type="reset" class="btn color-btn-theme waves-effect waves-light" value="{$reset}">{$reset}<i class="material-icons right">replay</i></button>
				</div>
			</form>
		{else}
			<div class="panel-content color-bg-warning color-br-panel color-warning">
				<div class="content-header">{$authenttitle}</div>
				<div class="content-text">{$authentdesc}</div>
			</div>
			<div class="panel-footer color-bg-footer"></div>
		{/if}
		<div class="panel-content color-br-panel">
			<form method="post" action="index.php?option=com_profile&amp;task=load_icon">
				<div class="row">
					<div class="input-field col s12 m6">
						<select class="icons" id="avatarText" name="icon_name">{$avatars}</select>
						<label for="avatarText" class="color-theme">{$avatarText}</label>
					</div>
					<div class="col s12 m2">
						<button type="submit" class="btn color-btn-theme waves-effect waves-light" value="submit"><i class="material-icons">file_upload</i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer color-bg-footer"></div>
	</div>
	 <div class="fixed-action-btn horizontal click-to-toggle">
</div>
