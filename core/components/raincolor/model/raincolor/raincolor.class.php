<?php
class Raincolor
{
	public $modx;
	public $config = array();

	function __construct(modX &$modx, $config = array())
	{
		$this->modx = $modx;

		$core_path = $this->modx->getOption('raincolor.core_path', $config, $this->modx->getOption('core_path').'components/raincolor/');
		$assets_url = $this->modx->getOption('raincolor.assets_url', $config, $this->modx->getOption('assets_url').'components/raincolor/');

		$this->config = array_merge(array(
            'core_path' => $core_path,
            'model_path' => $core_path.'model/',
            'processors_path' => $core_path.'processors/',
            'templates_path' => $core_path.'templates/',
            'chunks_path' => $core_path.'elements/chunks/',

            'js_url' => $assets_url.'js/',
            'css_url' => $assets_url.'css/',
            'assets_url' => $assets_url,
            'connector_url' => $assets_url.'connector.php',
		),$config);

		$this->modx->addPackage('raincolor', $this->config['model_path']);
		$this->modx->lexicon->load('raincolor:default');
	}

	public function initialize()
	{
		$ctx = $this->modx->context->key;
		
		$outerConfig = array(
			'js_url' => $this->config['js_url'],
            'css_url' => $this->config['css_url'],
            'assets_url' => $this->config['assets_url'],
            'connector_url' => $this->config['connector_url'],
			);

		if ($ctx == 'web') {
			$this->modx->regClientStartupScript('<script type="text/javascript">
			var Raincolor = Raincolor || {};
			Raincolor.config = ' . $this->modx->toJSON($outerConfig) . ';
		</script>');
		} else {
			$this->modx->controller->addJavascript($this->config['js_url'] . 'mgr/raincolor.js');
			$this->modx->controller->addHtml('<script type="text/javascript">
			Ext.onReady(function() {
				Raincolor.config = ' . $this->modx->toJSON($outerConfig) . ';
			});
			</script>');

			$this->modx->controller->addJavascript($this->config['js_url'].'lib/jquery.min.js');
			$this->modx->controller->addCss($this->config['css_url'].'jquery.minicolors.css');
			$this->modx->controller->addCss($this->config['css_url'].'mgr/main.css');
			$this->modx->controller->addJavascript($this->config['js_url'].'lib/jquery.minicolors.min.js');
			$this->modx->controller->addJavascript($this->config['js_url'].'lib/utils.js');
		}
	}

	public function updateTable()
	{
		// Получаем существующие опции и имена цветов
		$q = $this->modx->newQuery('msProductOption');
		$q->select('value');
		$q->where(array('key' => 'color'));
		$q->distinct('value');
		// $q->groupby('value');
		$options = $this->modx->getCollection('msProductOption', $q);

		$tmp = array();
		foreach ($options as $opt) {
			$tmp[] = $opt->value;
		}
		$options = $tmp;

		$q = $this->modx->newQuery('rcolor');
		$q->select('name');

		$items = $this->modx->getCollection('rcolor', $q);

		$tmp = array();
		foreach ($items as $item) {
			$tmp[] = $item->name;
		}
		$items = $tmp;

		unset($tmp);

		// Избавляемся от старых, ненужных значений
		foreach($items as $item){
			if(array_search($item, $options) === false)
				$this->removeItem($item);
		}
		// Добавляем новые
		foreach ($options as $opt) {
			if (array_search($opt, $items) === false) {
				$this->createItem($opt);
			}
		}
	}

	public function createItem($name)
	{
		$this->modx->runProcessor(
			'mgr/item/create',
			array('name' => $name),
			array('processors_path' => $this->config['processors_path'])
			);
	}

	public function removeItem($name)
	{
		$this->modx->runProcessor(
		   	'mgr/item/remove',
		   	array('name' => $name),
      		array('processors_path' => $this->config['processors_path'])
      		);
	}
	
	public function getColor($name)
	{
		$item = $this->modx->getObject('rcolor', array('name' => $name));

		$color = $item->get('color');
		return empty($color) ? false : $color;
	}
}