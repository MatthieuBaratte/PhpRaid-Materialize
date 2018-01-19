<div class="col-12 div--raidCharacter bg-class--{$class_name}">
	<div class="raidCharacter--class">
		{$class_img}
	</div>
	<div class="raidCharacter--name">
		{$char_name}
		<br><span class="signup--time">{$timestamp}</span>
	</div>
	{if $approve_img != '' or $cancel_img != '' or $delete_img != '' or $move_img != ''}
		<div class="raidCharacter--tool">
			{$approve_img}{$queue_img}{$delete_img}{$comments}{$move_img}
		</div>
	{/if}
</div>