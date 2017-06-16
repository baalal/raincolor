<?php
$core_path = $modx->getOption('raincolor.core_path', '', $modx->getOption('core_path').'components/raincolor/');
$raincolor = $modx->getService('raincolor', 'Raincolor', $core_path.'model/raincolor/');

switch ($modx->event->name) {
	case 'OnDocFormPrerender':
		// $raincolor->loadProductColors()
		$mode = $modx->getOption('mode', $scriptProperties);
		if ($mode != 'upd') break;
		$res = $modx->getObject("modResource", $scriptProperties['id']);
		if ( !$res || $res->get('class_key') != 'msProduct' ) break;

		$raincolor->initialize();
		$modx->controller->addLastJavascript($raincolor->config['js_url'].'mgr/widgets/product.grid.js');
		if ($modx->getCount('modPlugin', array('name' => 'AjaxManager', 'disabled' => false))) {
			// $modx->controller->addLastJavascript($raincolor->config['js_url'].'mgr/sections/product.js');
		} else{
			$modx->controller->addLastJavascript($raincolor->config['js_url'].'mgr/sections/product.js');
		}
		
		break;
	case 'OnDocFormSave':
		$raincolor->updateTable();
		break;
	case 'OnLoadWebDocument':
		$raincolor->initialize();
		$modx->regClientStartupScript($raincolor->config['js_url'].'web/default.js');
		$modx->regClientCSS($raincolor->config['css_url'].'web/style.css');
		break;
}