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
		$core_path = $this->modx->getOption('raincolor.core_path', null, $this->modx->getOption('core_path') . 'components/raincolor/');
		require_once $core_path . 'model/raincolor/raincolor.class.php';
		$this->raincolor = new Raincolor($this->modx);
		$this->raincolor->initialize();
		$this->raincolor->updateTable();
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