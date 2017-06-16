{foreach $options as $name => $values}
    <div id="{$name}">
        <span class="label-product">{('ms2_product_' ~ $name) | lexicon}:</span>
        {if $name != 'color'}
            {foreach $values as $value}
                <div>
                    <input type="radio" id="{$name}-{$value}" name="options&#91;{$name}&#93;" value="{$value}">
                    <label for="{$name}-{$value}"> {$value}</label>
                </div>
            {/foreach}
        {else}
            {foreach $values as $k => $v}
                <div class="raincolor-product" style="background-color: #{$v.color}" title="{$v.name}"></div>
            {/foreach}
                <input type="hidden" name="options&#91;{$name}&#93;" value="">
        {/if}
    </div>
{/foreach}