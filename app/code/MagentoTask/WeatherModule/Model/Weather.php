<?php

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


	protected function _construct()
	{
		$this->_init('MagentoTask\WeatherModule\Model\ResourceModel\weather');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

	public function getTemp()
    {
        return $this->getData(self::TEMP);
    }

    public function setTemp($temp)
    {
        return $this->setData(self::TEMP, $temp);
    }

    public function getTempMin()
    {
        return $this->getData(self::TEMP_MIN);
    }

    public function setTempMin($TEMP_MIN)
    {
        return $this->setData(self::TEMP_MIN, $TEMP_MIN);
    }

    public function getTempMax()
    {
        return $this->getData(self::TEMP_MAX);
    }

    public function setTempMax($TEMP_MAX)
    {
        return $this->setData(self::TEMP_MAX, $TEMP_MAX);
    }

    public function getDescription()
    {
        return $this->getData(self::Description);
    }

    public function setDescription($Description)
    {
        return $this->setData(self::Description, $Description);
    }



        public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

}