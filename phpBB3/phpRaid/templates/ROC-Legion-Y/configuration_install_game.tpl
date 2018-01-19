<div class="container-fluid" id="sectionConfigurationGame">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<div class="card sectionCard">
				<div class="card-header sectionCard--header">
					<div class="header--title text-center">{$header}</div>
				</div>
				{if isset($zip_support)}
					<form method="post" enctype="multipart/form-data" action="index.php?option=com_configuration&task={$task}">
						<div class="card-block sectionCard--content">
							<div class="form-group row form-group-row">
								<span class="content--description">{$game}</span>
							</div>
							<div class="form-group row form-group-row mb-0">
								<label for="fileName_text" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$fileName_text}:</label>
								<div class="col-8 col-sm-4 col-md-5">
									<input type="text" class="form-control  inputCard inputCard-border" id="fileName_text"  name="game_file" placeholder="Choose file ...">
								</div>
								<div class="col-4 col-sm-2 col-md-3">
									<div class="div--fileUpload">
										<a class="btn btn--input btn--bg" href="#"><i class="material-icons md-20">folder_open</i></a>
										<input type="file" id="uploadGame" class="custom-fileUpload">
									</div>
									{literal}
									<script>
										document.getElementById("uploadGame").onchange = function () {
											document.getElementById("fileName_text").value = this.value;
										};
									</script>
									{/literal}
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
						{if isset($zip_disabled)}
							<span class="content--description">{$zip_disabled}</span>
						{/if}
						<span class="content--description">{$manual_installation}</span>
					</div>
					<div class="card-block sectionCard--footer text-center">
						&nbsp;
					</div>
				{/if}
			</div>
		</div>
	</div>
</div>