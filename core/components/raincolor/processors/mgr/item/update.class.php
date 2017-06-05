<?php
/**
 * @package raincolor
 * @subpackage processors
 */
class RaincolorUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'rcItem';
    public $languageTopics = array('raincolor:default');
    public $primaryKeyField = 'name';

    public function process()
    {
    	$prop = $this->getProperties();

    	$q = sprintf('UPDATE modx_ms2_rcolors SET color="%s" WHERE name="%s"', $prop['color'], $prop['name']);

    	return $this->modx->query($q);
    }
}
return 'RaincolorUpdateProcessor';