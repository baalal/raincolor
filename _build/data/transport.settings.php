<?php
$settings = array();
$tmp = array(
    'raincolor.core_path' => array(
        'value' => 'd:/www/raincolor/core/components/raincolor/',
        // 'value' => '{core_path}components/raincolor/',
        'xtype' => 'textarea',
        'area' => 'raincolor.default_settings',
    ),
    'raincolor.assets_path' => array(
        'value' => 'd:/www/raincolor/assets/components/raincolor/',
        // 'value' => '{assets_path}components/raincolor/',
        'xtype' => 'textarea',
        'area' => 'raincolor.default_settings'
    ),
    'raincolor.assets_url' => array(
        'value' => '/raincolor/assets/components/raincolor/',
        // 'value' => '{assets_path}components/raincolor/',
        'xtype' => 'textarea',
        'area' => 'raincolor.default_settings'
    )
);
/** @var modX $modx */
foreach ($tmp as $k => $v) {
    /** @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        array(
            'key' => $k,
            'namespace' => 'raincolor',
            'editedon' => date('Y-m-d H:i:s'),
        ), $v
    ), '', true, true);
    $settings[] = $setting;
}
return $settings;