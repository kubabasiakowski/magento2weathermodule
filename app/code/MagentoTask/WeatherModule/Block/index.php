<?php

declare(strict_types=1);

namespace MagentoTask\WeatherModule\Block;

class Index extends \Magento\Framework\View\Element\Template {

	protected $_weatherFactory;
    
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\MagentoTask\WeatherModule\Model\Weather $weatherFactory
	)
	{
		$this->_weatherFactory = $weatherFactory;
		parent::__construct($context);
    }

	public function getWeatherItems() : object
    {
        $weather = $this->_weatherFactory->getCollection()->getLastItem();
		return $weather;
    }

}