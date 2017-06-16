<?php
/**
 * @package raincolor
 * @subpackage processors
 */
class RaincolorRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'rcolor';
    public $languageTopics = array('raincolor:default');
    public $primaryKeyField = 'name';

    public function process()
    {
    	$prop = $this->getProperties();

    	$q = sprintf('DELETE FROM modx_ms2_rcolors WHERE name="%s"', $prop['name']);

    	return $this->modx->query($q);
    }
}
return 'RaincolorRemoveProcessor';