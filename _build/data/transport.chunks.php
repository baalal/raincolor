<?php

$chunks = array();

$tmp = array(

    'tpl.rcCart' => 'rc_cart',
    'tpl.rcGetOrder' => 'rc_get_order',
    'tpl.rcOptions' => 'rc_options',
    'rcTpl' => 'rc_tpl',
    'tpl.mFilter2.filter.raincolor' => 'mfilter2_filter_raincolor'
);


foreach ($tmp as $k => $v) {
    /** @var modChunk $chunk */
    $chunk = $modx->newObject('modChunk');
    $chunk->fromArray(array(
        'id' => 0,
        'name' => $k,
        'description' => '',
        'snippet' => file_get_contents($sources['source_core'] . '/elements/chunks/' . $v . '.tpl'),
        'static' => BUILD_CHUNK_STATIC,
        'source' => 1,
        'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/' . $v . '.tpl',
    ), '', true, true);
    $chunks[] = $chunk;
}

return $chunks;