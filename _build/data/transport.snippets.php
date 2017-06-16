<?php
/** @var modX $modx */
/** @var array $sources */
$snippets = array();

$tmp = array(
    'rcCart' => 'rc_cart',
    'rcOptions' => 'rc_options',
    'rcGetOrder' => 'rc_get_order',
);

foreach ($tmp as $k => $v) {
    /** @var modSnippet $snippet */
    $snippet = $modx->newObject('modSnippet');
    $snippet->fromArray(array(
        'id' => 0,
        'name' => $k,
        'description' => '',
        'snippet' => getSnippetContent($sources['source_core'] . '/elements/snippets/' . $v . '.php'),
        'static' => BUILD_SNIPPET_STATIC,
        'source' => 1,
        'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/snippets/' . $v . '.php',
    ), '', true, true);

    /** @noinspection PhpIncludeInspection */
    $properties = include $sources['build'] . 'properties/properties.' . $v . '.php';
    $snippet->setProperties($properties);

    $snippets[] = $snippet;
}
unset($properties);

return $snippets;
