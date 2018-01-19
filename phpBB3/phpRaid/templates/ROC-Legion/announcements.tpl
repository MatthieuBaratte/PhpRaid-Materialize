
<div class="container" id="containerAnnouncements">
	<form method="POST" action="index.php?option=com_announcements&task=delete" onSubmit="return display_confirm('{$confirm_delete}')">
		<div class="collection with-header z-depth-1">
			<div class="collection-header">
				<h4>{$aHeader}</h4>
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
	</form>
</div>