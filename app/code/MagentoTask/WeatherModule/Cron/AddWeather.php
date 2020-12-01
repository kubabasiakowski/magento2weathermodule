<?php

declare(strict_types=1);

namespace MagentoTask\WeatherModule\Cron;

class AddWeather
{
	protected $_weatherFactory;

	public function __construct(\MagentoTask\WeatherModule\Model\WeatherFactory $weatherFactory)
	{
		$this->_weatherFactory = $weatherFactory;
	}

	public function execute() : void
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
	}



}