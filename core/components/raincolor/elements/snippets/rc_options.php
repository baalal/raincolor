<?php
/** @var modX $modx */
/** @var array $scriptProperties */
$tpl = $modx->getOption('tpl', $scriptProperties, 'tpl.msOptions');
if (!empty($input) && empty($product)) {
    $product = $input;
}
if (!empty($name) && empty($options)) {
    $options = $name;
}

$product = !empty($product) && $product != $modx->resource->id
    ? $modx->getObject('msProduct', $product)
    : $modx->resource;
if (!($product instanceof msProduct)) {
    return "[msOptions] The resource with id = {$product->id} is not instance of msProduct.";
}

$names = array_map('trim', explode(',', $options));
$options = array();
foreach ($names as $name) {
    if (!empty($name) && $option = $product->get($name)) {
        if (!empty($option[0])) {
            $options[$name] = $option;
        }
    }
}

// Raincolor injection
$modx->addPackage('raincolor',$modx->getOption('raincolor.core_path','',$modx->getOption('core_path').'components/raincolor/').'model/');
$raincolor = $modx->getService('raincolor');

foreach($options['color'] as $k => &$name){
    if($color = $raincolor->getColor($name))
        $name = array('name' => $name, 'color' => $color);
    else
        unset($options['color'][$k]);
}
//

/** @var pdoTools $pdoTools */
$pdoTools = $modx->getService('pdoTools');

return $pdoTools->getChunk($tpl, array(
    'id' => $product->id,
    'options' => $options,
));