<?php
namespace MagentoTask\WeatherModule\Model\ResourceModel\Weather;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'weather_id';
	protected $_eventPrefix = 'MagentoTask_WeatherModule_Weather_collection';
	protected $_eventObject = 'Weather_collection';

	
	protected function _construct()
	{
		$this->_init('MagentoTask\WeatherModule\Model\Weather', 'MagentoTask\WeatherModule\Model\ResourceModel\Weather');
	}

}

