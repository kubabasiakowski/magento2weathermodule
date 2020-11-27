<?php
namespace MagentoTask\WeatherModule\Model\ResourceModel;


class Weather extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected $_idFieldName = 'weather_id';
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('MagentoTask_WeatherModule_weather', 'weather_id');
	}
	
}
