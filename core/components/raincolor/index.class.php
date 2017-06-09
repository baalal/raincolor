<?php
/**
 * Class RaincolorMainController
 */
abstract class RaincolorMainController extends modExtraManagerController {
	/** @var Raincolor $raincolor */
	public $raincolor;
	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('raincolor.core_path', null, $this->modx->getOption('core_path') . 'components/raincolor/');
		require_once $corePath . 'model/raincolor/raincolor.class.php';
		$this->raincolor = new Raincolor($this->modx);
		// $this->addCss($this->raincolor->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->raincolor->config['jsUrl'] . 'mgr/raincolor.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			Raincolor.config = ' . $this->modx->toJSON($this->raincolor->config) . ';
			Raincolor.config.connector_url = "' . $this->raincolor->config['connectorUrl'] . '";
		});
		</script>');

		$this->addJavascript($this->raincolor->config['jsUrl'].'lib/jquery.min.js');
		// $this->addCss($this->raincolor->config['cssUrl'].'jquery.minicolors.css');
		$this->addCss($this->raincolor->config['cssUrl'].'custom.minicolors.css');
		$this->addJavascript($this->raincolor->config['jsUrl'].'lib/jquery.minicolors.min.js');
		$this->addJavascript($this->raincolor->config['jsUrl'].'mgr/minicolors.default.js');

		parent::initialize();
	}
	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('raincolor:default');
	}
	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}
/**
 * Class IndexManagerController
 */
class IndexManagerController extends RaincolorMainController {
	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}