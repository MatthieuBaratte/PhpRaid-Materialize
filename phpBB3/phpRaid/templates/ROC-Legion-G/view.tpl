<div class="container-fluid" id="sectionView">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<div class="card sectionCard">
				<div class="card-header sectionCard--header">
					<div class="header--title text-center">{$header}</div>
				</div>
				<div class="card-block sectionCard--content sectionCard--raidInfo">
					<span class="content--header">{$title}</span>
					<span class="content--description">{$description}</span>
					<span class="content--footer text-right">{$timeUntil}</span>
					<div class="content--divider"></div>
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group row form-group-rowDetails">
								<label for="leaderText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$leaderText}:</label>
								<div class="col-6 col-sm-7">
									<label for="leader" class="col-form-label inputCard--LabelDetails--value ">{$leader}</label>
								</div>
							</div>
							<div class="form-group row form-group-rowDetails">
								<label for="inviteText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$inviteText}:</label>
								<div class="col-6 col-sm-7">
									<label for="invite_time" class="col-form-label inputCard--LabelDetails--value ">{$invite_time}</label>
								</div>
							</div>
							<div class="form-group row form-group-rowDetails">
								<label for="startText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$startText}:</label>
								<div class="col-6 col-sm-7">
									<label for="start_time" class="col-form-label inputCard--LabelDetails--value ">{$start_time}</label>
								</div>
							</div>
							<div class="form-group row form-group-rowDetails">
								<label for="maxLevelText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$maxLevelText}:</label>
								<div class="col-6 col-sm-7">
									<label for="max_level" class="col-form-label inputCard--LabelDetails--value ">{$max_level}</label>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group row form-group-rowDetails">
								<label for="approvedText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$approvedText}:</label>
								<div class="col-6 col-sm-7">
									<label for="approvedCount" class="col-form-label inputCard--LabelDetails--value ">{$approvedCount}</label>
								</div>
							</div>
							<div class="form-group row form-group-rowDetails">
								<label for="queuedText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$queuedText}:</label>
								<div class="col-6 col-sm-7">
									<label for="queuedCount" class="col-form-label inputCard--LabelDetails--value ">{$queuedCount}</label>
								</div>
							</div>
							<div class="form-group row form-group-rowDetails">
								<label for="cancelledText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$cancelledText}:</label>
								<div class="col-6 col-sm-7">
									<label for="cancelledCount" class="col-form-label inputCard--LabelDetails--value ">{$cancelledCount}</label>
								</div>
							</div>
							<div class="form-group row form-group-rowDetails">
								<label for="maxText" class="col-6 col-sm-5 col-form-label inputCard--LabelDetails">{$maxText}:</label>
								<div class="col-6 col-sm-7">
									<label for="maxCount" class="col-form-label inputCard--LabelDetails--value ">{$maxCount}</label>
								</div>
							</div>						
						</div>
					</div>
					<div class="content--divider"></div>
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group row form-group-rowDetails">
								<label for="signupText" class="col-6 col-sm-3 col-form-label inputCard--LabelDetails">{$signupText}:</label>
								<div class="col-6 col-sm-9">
									<label for="signupIcon" class="col-form-label inputCard--LabelDetails--value">{$signupIcon}</label>
								</div>
							</div>
						</div>
						{if isset($signupOtherText)}
							<div class="col-12 col-sm-6">
								<div class="form-group row form-group-rowDetails">
									<label for="{$signupOtherText}" class="col-6 col-sm-3 col-form-label inputCard--LabelDetails">{$signupOtherText}</label>
									<div class="col-6 col-sm-9">
										<label for="{$signupOtherText}" class="col-form-label inputCard--LabelDetails--value">{$signupOtherIcon}</label>
									</div>
								</div>
							</div>
						{/if}
					</div>
				</div>
				{if isset($comment_list)}
				<div class="card-header sectionCard--header comment--header">
					<div class="header--title text-center">
						<a data-toggle="collapse" href="#collapseCommentaires" aria-expanded="true" aria-controls="collapseCommentaires" data-md="commentexpand" data-mdbis="commentexpandbis">
							<i class="material-icons md-18" id="commentexpand">expand_more</i> Commentaires <i class="material-icons md-18" id="commentexpandbis">expand_more</i>
						</a>
					</div>
				</div>
				<div class="collapse show" id="collapseCommentaires" aria-expanded="true">
					<div class="card-block sectionCard--content sectionCard--raidComment">
						{$comment_list}
					</div>
				</div>
				{/if}
				<div class="card-header sectionCard--header header--raid">
					<div class="btn icone--header icone--approved"><i class="material-icons md-18">event_available</i></div><div class="header--title text-left"> {$approved}</div>
				</div>
				<div class="card-block sectionCard--content content--raid">
					<div class="row">
						{$approved_signups}
					</div>
				</div>
				<div class="card-header sectionCard--header header--raid">
					<div class="btn icone--header icone--queued"><i class="material-icons md-18">hourglass_empty</i></div><div class="header--title text-left"> {$queued}</div>
				</div>
				<div class="card-block sectionCard--content content--raid">
					<div class="row">
						{$queued_signups}
					</div>
				</div>
				<div class="card-header sectionCard--header header--raid">
					<div class="btn icone--header icone--cancelled"><i class="material-icons md-18">event_busy</i></div><div class="header--title text-left"> {$cancelled}</div>
				</div>
				<div class="card-block sectionCard--content content--raid">
					<div class="row">
						{$cancelled_signups}
					</div>
				</div>
				<div class="card-footer sectionCard--footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>
</div>