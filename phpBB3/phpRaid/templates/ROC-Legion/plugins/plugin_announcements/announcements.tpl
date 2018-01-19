{capture assign="plugin_announcements"}
	{section name=announcements loop=1}
		<div class="container-fluid" id="announcementPlugin">
			<div class="row">
				<div class="offset-xl-1 col-12 col-xl-10">
					<div class="card sectionCard">
						<div class="card-header sectionCard--header header--announce">
							<div class="btn icone--header icone--announce"><i class="material-icons md-18">whatshot</i></div>
							<div class="header--title div-left">{$a_data[announcements].titleblock}</div>
							{$a_data[announcements].actions}
						</div>
						<div class="card-block sectionCard--content">
							<span class="content--header">{$a_data[announcements].title}</span>
							<span class="content--description">{$a_data[announcements].message}</span>
							<span class="content--footer text-right">{$a_data[announcements].author} @ {$a_data[announcements].date} - {$a_data[announcements].time}</span>
						</div>
					</div>			
				</div>
			</div>
		</div>
	{/section}
{/capture}