{capture assign="class_limits"}
	{section name=limits loop=$l_data}
		{if $l_data[limits].text == 'Dps'}
			{validate id="`$l_data[limits].name`" message="`$l_data[limits].errortext`" assign="errorDps"}
			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="{$l_data[limits].value}" id="{$l_data[limits].text}" name="{$l_data[limits].field}" class="validate {if isset($errorDps)}{$classError}{/if}" {if isset($errorDps)}{$propError}{/if}>
					<label for="{$l_data[limits].text}" class="color-theme" data-error="{if isset($errorDps)}{$l_data[limits].errortext}{/if}">{$l_data[limits].text}</label>	
				</div>
			</div>
		{elseif $l_data[limits].text == 'Healer'}
			{validate id="`$l_data[limits].name`" message="`$l_data[limits].errortext`" assign="errorHealer"}
			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="{$l_data[limits].value}" id="{$l_data[limits].text}" name="{$l_data[limits].field}" class="validate {if isset($errorHealer)}{$classError}{/if}" {if isset($errorHealer)}{$propError}{/if}>
					<label for="{$l_data[limits].text}" class="color-theme" data-error="{if isset($errorHealer)}{$l_data[limits].errortext}{/if}">{$l_data[limits].text}</label>	
				</div>
			</div>
		{elseif $l_data[limits].text == 'Tank'}
			{validate id="`$l_data[limits].name`" message="`$l_data[limits].errortext`" assign="errorTank"}
			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="{$l_data[limits].value}" id="{$l_data[limits].text}" name="{$l_data[limits].field}" class="validate {if isset($errorTank)}{$classError}{/if}" {if isset($errorTank)}{$propError}{/if}>
					<label for="{$l_data[limits].text}" class="color-theme" data-error="{if isset($errorTank)}{$l_data[limits].errortext}{/if}">{$l_data[limits].text}</label>	
				</div>
			</div>
		{else}
			<div class="row"> 
				<div class="input-field col s12 m6">
					<input type="text" value="{$l_data[limits].value}" id="{$l_data[limits].text}" name="{$l_data[limits].field}" class="validate">
					<label for="{$l_data[limits].text}" class="color-theme" data-error="{validate id="`$l_data[limits].name`" message="`$l_data[limits].errortext`"}">{$l_data[limits].text}</label>	
				</div>
			</div>
		{/if}
	{/section}
{/capture}