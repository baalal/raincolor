<?php
$properties = array();
$tmp = array(
    'tpl' => array(
        'type' => 'textfield',
        'value' => 'tpl.rcGetOrder',
    ),
    'includeTVs' => array(
        'type' => 'textfield',
        'value' => '',
    ),
    'includeThumbs' => array(
        'type' => 'textfield',
        'value' => '',
    ),
    'toPlaceholder' => array(
        'type' => 'textfield',
        'value' => '',
    ),
    'showLog' => array(
        'type' => 'combo-boolean',
        'value' => false,
    ),
);
foreach ($tmp as $k => $v) {
    $properties[] = array_merge(array(
        'name' => $k,
        'desc' => 'raincolor_prop_' . $k,
        'lexicon' => 'raincolor:default',
    ), $v);
}
return $properties;