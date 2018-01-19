{capture assign="class_limits"}
	{section name=limits loop=$l_data}
		<div class="form-group row form-group-row {if $l_data[limits].name=='2_limit'}mb-0{/if}">
			<label for="{$l_data[limits].text}" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$l_data[limits].text}</label>
			<div class="col-4 col-sm-2 col-md-1">
				<input type="text" class="form-control  inputCard inputCard-border" id="{$l_data[limits].text}" placeholder="{$limits_header}" name="{$l_data[limits].field}" value="{$l_data[limits].value}">
				<div class="form-control-feedback text-danger">{validate id="`$l_data[limits].name`" message="`$l_data[limits].errortext`"}</div>
			</div>
		</div>
	{/section}
{/capture}