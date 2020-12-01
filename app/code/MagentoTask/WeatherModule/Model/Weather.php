<?php

declare(strict_types=1);

namespace MagentoTask\WeatherModule\Model;
class Weather extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'MagentoTask_WeatherModule_weather';

	protected $_cacheTag = 'MagentoTask_WeatherModule_weather';

	protected $_eventPrefix = 'MagentoTask_WeatherModule_weather';

	const TEMP = "temp";
	const DESCRIPTION = "desc";
	const TEMP_MIN = "tempmin";
	const TEMP_MAX = "tempmax";
    const CREATED_AT = "createdat";
    const UPDATE_TIME = "updatetime";


	protected function _construct()
	{
		$this->_init('MagentoTask\WeatherModule\Model\ResourceModel\weather');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues() : array
	{
		$values = [];

		return $values;
	}

	public function getTemp() : float
    {
        return $this->getData(self::TEMP);
    }

    public function setTemp(float $temp) : Weather
    {
        return $this->setData(self::TEMP, $temp);
    }

    public function getTempMin() : float
    {
        return $this->getData(self::TEMP_MIN);
    }

    public function setTempMin(float $TEMP_MIN) : Weather
    {
        return $this->setData(self::TEMP_MIN, $TEMP_MIN);
    }

    public function getTempMax() : float
    {
        return $this->getData(self::TEMP_MAX);
    }

    public function setTempMax(float $TEMP_MAX) : Weather
    {
        return $this->setData(self::TEMP_MAX, $TEMP_MAX);
    }

    public function getDescription() : string
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription(string $Description) : Weather
    {
        return $this->setData(self::DESCRIPTION, $Description);
    }



        public function getUpdateTime() : string
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function setUpdateTime(string $updateTime) : Weather
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    public function getCreatedAt() : string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt) : Weather
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

}