<?php
/**
 * Resolve creating custom db tables during install.
 *
 * @package raincolor
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('raincolor.core_path',null,$modx->getOption('core_path').'components/raincolor/').'model/';
            $modx->addPackage('raincolor',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('rcolor');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;
?>