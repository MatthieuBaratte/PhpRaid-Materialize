{capture assign="attributes"}
	{section name=atts loop=$a_data}
		<div class="form-group row form-group-row {if $a_data[atts].compt=='2'}mb-0{/if}">
			<label for="{$a_data[atts].text}" class="col-12 col-sm-6 col-md-4 col-form-label inputCard--Label">{$a_data[atts].text}</label>
			<div class="col-12 col-sm-4 col-md-3">
				<input type="text" class="form-control  inputCard inputCard-border" id="{$a_data[atts].name}" placeholder="{$a_data[atts].text}" name="{$a_data[atts].name}" value="{$a_data[atts].value}">
				<div class="form-control-feedback text-danger">{validate id="`$a_data[atts].name`" message="`$a_data[atts].errortext`"}</div>
			</div>
		</div>
	{/section}
{/capture}