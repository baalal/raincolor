<?php
/**
 * Get a list of raincolor
 *
 * @package raincolor
 * @subpackage processors
 */
class RaincolorGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'rcItem';
    public $languageTopics = array('raincolor:default');
    public $defaultSortField = 'name';
    public $defaultSortDirection = 'ASC';
    // public $objectType = 'raincolor.rc';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                'name:LIKE' => '%'.$query.'%',
                'OR:description:LIKE' => '%'.$query.'%',
            ));
        }
        return $c;
    }
}
return 'RaincolorGetListProcessor';