<div class="container" id="containerLinks">	
	<form method="POST" action="index.php?option=com_external_links&amp;task=delete" onSubmit="return display_confirm('{$confirm_delete}')">
		<div class="collection with-header z-depth-1">
			<div class="collection-header">
				<h4>{$links_header}</h4>
				<div class="secondary-content valign-wrapper hide">
					<input type="checkbox" class="filled-in" id="checkbox_all" onClick="invertAll(this,this.form);" />
					<label for="checkbox_all"></label>
				</div>
				<div class="secondary-content valign-wrapper">{$caption}</div>
			</div>
			{$colAnnounce}
			<div class="collection-footer">
				{$pagination}
				<div class="fixed-action-btn horizontal click-to-toggle valign-wrapper">
					<a class="btn-floating btn-color-default">
						<i class="material-icons">more_vert</i>
					</a>
					<ul>
						<li><button href="#!" type="input" class="btn-floating red"><i class="material-icons">delete</i></button></li>
						<li><a href="#!" class="btn-floating grey" onclick="checkuncheck_all();"><i class="material-icons">check_box</i></a></li>
						<li><a href="#!" class="btn-floating yellow darken-2" onclick="edit_announce();"><i class="material-icons">edit</i></a></li>
						<li><a href="index.php?option=com_announcements&amp;task=new" class="btn-floating blue"><i class="material-icons">add</i></a></li>
					</ul>
				</div>
				<div class="collection-btn-sort valign-wrapper">
					<a class="dropdown-button btn btn-sort btn-color-default" href="#!" data-activates="sort">
						<i class="material-icons">sort</i> <i class="material-icons">arrow_drop_down</i>
					</a>
					{$btnSort}
				</div>
			</div>
		</div>

		<div class="panel color-bg-menu color-br-panel z-depth-4">
			<div class="panel-header center-align color-bg-header color-theme">
				{$links_header}
			</div>
			<div class="panel-content color-br-panel">
				<div class="row">
					{$links}
				</div>
			</div>
			<div class="panel-footer center-align color-bg-footer">
				<a class="btn color-btn-theme waves-effect waves-light" href="index.php?option=com_external_links&amp;task=new"><i class="material-icons right">add</i></a>
				<button type="input" class="btn color-btn-theme waves-effect waves-light" value="{$reset}"><i class="material-icons right">delete</i></button>
			</div>
		</div>
	</form>
</div>