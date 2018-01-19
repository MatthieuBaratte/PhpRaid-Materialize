<div class="container-fluid" id="sectionLinksForm">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<form method="post" action="index.php?option=com_external_links&task={$task}">
				<div class="card sectionCard"> 
					<div class="card-header sectionCard--header">
						<div class="header--title text-center">{$links_header}</div>
					</div>
					<div class="card-block sectionCard--content">
						<div class="form-group row form-group-row">
							<label for="txt_title" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$txt_title}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control inputCard inputCard-border" id="txt_title" placeholder="{$txt_title}" name="title" value="{$title|escape}">
								<div class="form-control-feedback text-danger">{validate id="title" message="$linktitleError"}</div>
							</div>
						</div>
						<div class="form-group row form-group-row">
							<label for="txt_icon" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$txt_icon}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control inputCard inputCard-border" id="txt_icon" placeholder="{$txt_icon}" name="icon" value="{$icon|escape}">
							</div>
						</div>	
						<div class="form-group row form-group-row">
							<label for="txt_url" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$txt_url}:</label>
							<div class="col-12 col-sm-4 col-md-3">
								<input type="text" class="form-control inputCard inputCard-border" id="txt_url" placeholder="{$txt_url}" name="url" value="{$url|escape}">
								<div class="form-control-feedback text-danger">{validate id="url" message="$linkurlError"}</div>
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