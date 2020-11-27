<?php
namespace MagentoTask\WeatherModule\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0', '<')) {
			if (!$installer->tableExists('MagentoTask_WeatherModule_weather')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('MagentoTask_WeatherModule_weather')
				)
					->addColumn(
					'weather_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'weather ID'
				)
				->addColumn(
					'temp',
					\Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
					255,
					['nullable' => true],
					'weather temp'
				)
				->addColumn(
					'description',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable' => true],
					'weather description'
				)
				->addColumn(
					'temp_min',
					\Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
					'64k',
					['nullable' => true],
					'weather temp_min'
				)
				->addColumn(
					'temp_max',
					\Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
					255,
					['nullable' => true],
					'weather temp_max'
				)
				->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('weather Table');
				$installer->getConnection()->createTable($table);
			}
		}

		$installer->endSetup();
	}
}

