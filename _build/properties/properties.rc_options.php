<?php
$properties = array();
$tmp = array(
    'product' => array(
        'type' => 'numberfield',
        'value' => '',
    ),
    'options' => array(
        'type' => 'textfield',
        'value' => '',
    ),
    'tpl' => array(
        'type' => 'textfield',
        'value' => 'tpl.rcOptions',
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