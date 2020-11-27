<?php
namespace MagentoTask\WeatherModule\Block\Adminhtml;

class Weather extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_weather';
		$this->_blockGroup = 'MagentoTask_WeatherModule';
		$this->_headerText = __('Weather in Lublin');
		parent::_construct();
	}
}

