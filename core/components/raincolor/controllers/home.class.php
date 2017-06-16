<?php
/**
 * The home manager controller for Raincolor.
 *
 */
class RaincolorHomeManagerController extends RaincolorMainController {
	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}
	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('raincolor');
	}
	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addJavascript($this->raincolor->config['js_url'] . 'mgr/widgets/raincolor.grid.js');
		$this->addJavascript($this->raincolor->config['js_url'] . 'mgr/widgets/home.panel.js');
		$this->addLastJavascript($this->raincolor->config['js_url'] . 'mgr/sections/home.js');
	}
	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->raincolor->config['templates_path'] . 'home.tpl';
	}
}