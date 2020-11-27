<?php

namespace MagentoTask\WeatherModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{

	protected $_pageFactory;

	protected $_weatherFactory;

	public function __construct(
			\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\MagentoTask\WeatherModule\Model\WeatherFactory $weatherFactory)
	{
		$this->_pageFactory = $pageFactory;
		$this->_weatherFactory = $weatherFactory;

		return parent::__construct($context);
	}

	public function execute()
	{
		$api_key = "7728d767a3017544ca1728e0798e94d6";
		$city_id = "765876";
		$api_url = "http://api.openweathermap.org/data/2.5/weather?id=".$city_id."&appid=".$api_key;

		$json=file_get_contents($api_url);
		$data=json_decode($json,true);


		$model = $this->_weatherFactory->create();
        $model->addData([
            "name" => $data['name'],
            "temp" => floatval($data['main']['temp']),
            "description" => $data['weather'][0]['description'],
            "temp_max" => floatval($data['main']['temp_max']),
            "temp_min" => floatval($data['main']['temp_min'])
            ]);
        $saveData = $model->save();


		$page = $this->_pageFactory->create();
		//$block = $page->getLayout()->getBlock('weather_index_index');
		//$block->setData('custom_parameter', 'a');

		return $page;
	}
}
