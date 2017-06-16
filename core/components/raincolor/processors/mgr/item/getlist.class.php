<?php
/**
 * Get a list of raincolor
 *
 * @package raincolor
 * @subpackage processors
 */
class RaincolorGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'rcolor';
    public $languageTopics = array('raincolor:default');
    public $defaultSortField = 'name';
    public $defaultSortDirection = 'ASC';
    // public $objectType = 'raincolor.rc';

}
return 'RaincolorGetListProcessor';