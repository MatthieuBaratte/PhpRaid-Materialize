<div class="container-fluid" id="sectionProfil">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<div class="card sectionCard">
				<div class="card-header sectionCard--header">
					<div class="header--title text-center">{$header} {$error}</div>
				</div>
				{if $authentype!='phpbb3'}
					<form method="post" action="index.php?option=com_profile">
						<div class="card-block sectionCard--content">
							<div class="form-group row form-group-row">
								<label for="emailText" class="col-sm-6 col-md-5 col-lg-4 col-form-label inputCard--Label">{$emailText} :</label>
								<div class="col-sm-4 col-md-3">
									<input type="text" class="form-control  inputCard inputCard-border" id="emailText" placeholder="{$emailText}" name="user_email" value="{$user_email|escape}">
									<div class="form-control-feedback text-danger">{validate id="email" message="$emailError"}</div>
								</div>
							</div>
							<div class="form-group row form-group-row">
								<label for="newPasswordText" class="col-sm-6 col-md-5 col-lg-4 col-form-label inputCard--Label">{$newPasswordText} :</label>
								<div class="col-sm-4 col-md-3">
									<input type="password" class="form-control  inputCard inputCard-border" id="newPasswordText" placeholder="{$newPasswordText}" name="new_password" value="{$new_password|escape}">
									<div class="form-control-feedback text-danger">{$confirmPasswordError}</div>
								</div>
							</div>
							<div class="form-group row form-group-row">
								<label for="confirmPasswordText" class="col-sm-6 col-md-5 col-lg-4 col-form-label inputCard--Label">{$confirmPasswordText} :</label>
								<div class="col-sm-4 col-md-3">
									<input type="password" class="form-control  inputCard inputCard-border" id="confirmPasswordText" placeholder="{$confirmPasswordText}" name="confirm_password" value="{$confirm_password|escape}">
									<div class="form-control-feedback text-danger">{$confirmPasswordError}{$flagAuthentificationType}</div>
								</div>
							</div>
							<div class="form-group row form-group-row m-b-0">
								<label for="enterPasswordText" class="col-sm-6 col-md-5 col-lg-4 col-form-label inputCard--Label">{$enterPasswordText} :</label>
								<div class="col-sm-4 col-md-3">
									<input type="password" class="form-control  inputCard inputCard-border" id="enterPasswordText" placeholder="{$enterPasswordText}" name="enter_password" value="{$enter_password|escape}">
									<div class="form-control-feedback text-danger">{$enterPasswordError}</div>
								</div>
							</div>
						</div>
						<div class="card-block sectionCard--footer text-center">
							<button type="submit" class="btn btn--sectionFooter btn--bg" value="{$submit}">{$submit}</button>
							<button type="reset" class="btn btn--sectionFooter btn--bg" value="{$reset}">{$reset}</button>
						</div>	
					</form>
				{else}
					<div class="card-block sectionCard--content">
						<span class="content--header text-warning">{$authenttitle}</span>
						<span class="content--description text-warning">{$authentdesc}</span>
					</div>
					<div class="card-block sectionCard--footer text-center">
						&nbsp;
					</div>
				{/if}
				<form method="post" action="index.php?option=com_profile&amp;task=load_icon">
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row m-b-0">
							<label for="avatarText" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$avatarText} :</label>
							<div class="col-6 col-sm-4 col-md-3">
								<select class="form-control inputCard inputCard-border" id="avatarText" name="icon_name">{$avatars}</select>
							</div>
							<div class="col-4 col-sm-2 col-md-2">
								{$iconAvatar_text}
							</div>
						</div>
					</div>
					<div class="card-block sectionCard--footer text-center">
						&nbsp;
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
