<?php 
$action= $modx->newObject('modAction');
$action->fromArray(array(
    'id' => 1,
    'namespace' => 'raincolor',
    'parent' => 0,
    'controller' => 'index',
    'haslayout' => true,
    'lang_topics' => 'raincolor:default',
    'assets' => '',
),'',true,true);
 
$menu= $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'raincolor',
    'parent' => 'components',
    'description' => 'raincolor.desc',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
),'',true,true);
$menu->addOne($action);
 
return $menu;