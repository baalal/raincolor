<?php
/**
 * @package raincolor
 * @subpackage processors
 */
class RaincolorCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'rcItem';
    public $languageTopics = array('raincolor:default');
    // public $objectType = 'raincolor.rc';

    public function beforeSave() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('raincolor.item_err_ns_name'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name',$this->modx->lexicon('raincolor.item_err_ae'));
        }
        return parent::beforeSave();
    }
}
return 'RaincolorCreateProcessor';