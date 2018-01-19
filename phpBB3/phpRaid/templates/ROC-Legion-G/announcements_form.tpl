<div class="container-fluid" id="sectionAnnoucementsForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_announcements&task={$task}">
				<div class="card sectionCard">
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$header}</div>
					</div>
					<div class="card-block sectionCard--content text-left">
						<div class="form-group row form-group-row">
							<label for="titleText" class="col-12 col-sm-2 col-form-label inputCard--Label">{$titleText}:</label>
							<div class="col-12 col-sm-10 col-md-8">
								<input type="text" class="form-control  inputCard inputCard-border" id="titleText" placeholder="{$titleText}" name="announcement_title" value="{$announcement_title|escape}">
								<div class="form-control-feedback text-danger">{validate id="title" message="$titleError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row mb-0">
							<label for="messageText" class="col-12 col-sm-2 col-form-label inputCard--Label">{$messageText}:</label>
							<div class="col-12 col-sm-10 col-md-8">
								<textarea type="text" class="form-control inputCard inputCard-border" rows="10" id="messageText" placeholder="{$messageText}" name="announcement_msg">{$announcement_msg|escape}</textarea>
								<div class="form-control-feedback text-danger">{validate id="message" message="$messageError"}</div>
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