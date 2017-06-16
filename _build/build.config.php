<?php

define('PKG_NAME','Raincolor');
define('PKG_NAME_LOWER','raincolor');
define('PKG_VERSION','1.0');
define('PKG_RELEASE','beta');

define('MODX_CORE_PATH', dirname(dirname(dirname(__FILE__))) . '/revo/core/');
define('MODX_BASE_PATH',  MODX_CORE_PATH. 'modx/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');

define('MODX_BASE_URL','/modx/');
define('MODX_CORE_URL', MODX_BASE_URL . 'core/');
define('MODX_MANAGER_URL', MODX_BASE_URL . 'manager/');
define('MODX_CONNECTORS_URL', MODX_BASE_URL . 'connectors/');
define('MODX_ASSETS_URL', MODX_BASE_URL . 'assets/');

define('BUILD_MENU_UPDATE', true);
define('BUILD_SETTING_UPDATE', true);
define('BUILD_CHUNK_UPDATE', true);
define('BUILD_SNIPPET_UPDATE', true);
define('BUILD_PLUGIN_UPDATE', true);
define('BUILD_EVENT_UPDATE', true);


define('BUILD_CHUNK_STATIC', false);
define('BUILD_SNIPPET_STATIC', false);
define('BUILD_PLUGIN_STATIC', false);