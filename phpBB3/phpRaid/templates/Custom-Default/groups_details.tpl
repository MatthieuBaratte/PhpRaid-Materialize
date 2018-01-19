<div class="container-fluid" id="sectionGroupsDetails">	
	<div class="row">
		<div class="offset-xl-1 col-12 col-xl-10">
			<div class="card sectionCard">
				<form action="index.php?option=com_groups&task=delete_user&id={$id}" method="POST">
					<div class="card-header sectionCard--header content--table">
						<div class="header--title text-center">{$gdHeader}</div>
					</div>
					<div class="card-block sectionCard--content content--table">
						<div class="table-responsive">
							{$gdData}
						</div>
					</div>
					<div class="card-footer sectionCard--footer content--table text-right">
						{$remove_button}
					</div>
				</form>
				<div class="card-block sectionCard--content" id="sectionGroupsDetailsSearch">
					<div class="form-group row form-group-row">
						<div class="col-12 col-sm-6">
							<form class="form-inline" name="post" method="POST" action="index.php?option=com_groups&task=add&id={$group_id}#sectionGroupsDetailsSearch">
								{$gdFind}
							</form>
						</div>
					</div>
					<div class="content--divider"></div>
					<div class="form-group row form-group-row mb-0">
						<div class="col-12 col-sm-6 mb-1">
							<form class="form-inline" role="form" method="POST" name="search" action="index.php?option=com_groups&task=search&id={$group_id}#sectionGroupsDetailsSearch">
								<input type="text" class="form-control inputCard inputCard-border col-8" id="search_username" placeholder="{$search_username}" name="search_username">
								<button class="btn btn--input btn--outline" type="submit" name="usersubmit"><i class="material-icons md-14">search</i></button>
							</form>
						</div>
						<div class="col-12 col-sm-6">
							<form class="form-inline" role="form" method="POST" name="search" action="index.php?option=com_groups&task=addsearch&id={$group_id}">
								<select class="form-control inputCard inputCard-border col-8" id="find_user" name="username_list">{$user_options}</select>
								<button class="btn btn--input btn--bg" type="submit" name="use"><i class="material-icons md-14">person_add</i></button>
							</form>
						</div>
					</div>
				</div>
				<div class="card-footer sectionCard--footer">
					&nbsp;
				</div>
			</div>
		</div>
	</div>
</div>