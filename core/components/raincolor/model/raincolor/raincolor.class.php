<?php
class Raincolor
{
	public $modx;
	public $config = array();

	function __construct(modX &$modx, $config = array())
	{
		$this->modx = $modx;

		$basePath = $this->modx->getOption('raincolor.core_path', $config, $this->modx->getOption('core_path').'components/raincolor/');
		$assetsUrl = $this->modx->getOption('raincolor.assets_url', $config, $this->modx->getOption('assets_url').'components/raincolor/');

		$this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath.'model/',
            'processorsPath' => $basePath.'processors/',
            'templatesPath' => $basePath.'templates/',
            'chunksPath' => $basePath.'elements/chunks/',
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
		),$config);

		$this->modx->addPackage('raincolor', $this->config['modelPath']);
		$this->modx->lexicon->load('raincolor:default');
	}

	public function initialize()
	{

	}
}