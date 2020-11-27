<?php

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

	public function currentWeather(){
		$api_key = "7728d767a3017544ca1728e0798e94d6";
		$city_id = "765876";
		$api_url = "http://api.openweathermap.org/data/2.5/weather?id=".$city_id."&appid=".$api_key;

		$json=file_get_contents($api_url);
		$data=json_decode($json,true);


        echo "<h2>Current Temperature in Lublin is " . floatval($data['main']['temp']) . " stopni Kelvina (" . floatval($data['main']['temp'] - 272.15) . " stopni Celsjusza)";


	}
}