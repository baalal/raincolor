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

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $id = $this->getProperty('id');

        if (!empty($id)) {
            $q = $this->modx->newQuery('msProductOption', array('product_id' => $id, '`key`' => 'color'));
            $rows = $this->modx->getCollection('msProductOption', $q);

            $names = array();
            foreach ($rows as $row) {
                $names[] = $row->value;
            }
            $c->where(array('name:IN' => $names));
        }
        return $c;
    }
}
return 'RaincolorGetListProcessor';