<?php 
class FiltersHandler extends mse2FiltersHandler
{
	public function buildRaincolorFilter(array $values, $name = '') {
		if (!$this->modx->addPackage('raincolor',$this->modx->getOption('raincolor.core_path','',$this->modx->getOption('core_path').'components/raincolor/').'model/')) {
			return $this->buildDefaultFilter($values, $name);
		}
		$raincolor = $this->modx->getService('raincolor');

		if (count($values) < 2 && empty($this->config['showEmptyFilters'])) {
			return array();
		}

		$results = array();
		foreach ($values as $value => $ids) {
			if ($value !== '' && $color = $raincolor->getColor($value)) {
				$results[$value] = array(
					'title' => $value,
					'value' => "#$color",
					'type' => 'default',
					'resources' => $ids
				);
			}
		}
		ksort($results);

		return $results;
	}
}
?>