<?php
namespace First\Dummy\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('first_registration');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                            ->addColumn(
                                'id',
                                Table::TYPE_INTEGER,
                                null,
                     ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
                                )
                            ->addColumn(
                                'name',
                                Table::TYPE_TEXT,
                                255,
                                ['nullable'=>false,'default'=>'']
                                )
                                 ->addColumn(
                                    'email',
                                    Table::TYPE_TEXT,
                                    255,
                                    ['nullable'=>false,'default'=>'']
                                    )
                                    ->addColumn(
                                        'phno',
                                        Table::TYPE_TEXT,
                                        255,
                                        ['nullable'=>false,'default'=>'']
                                        )
                                        ->addColumn(
                                            'pass',
                                            Table::TYPE_TEXT,
                                            255,
                                            ['nullable'=>false,'default'=>'']
                                            )
                                            ->addColumn(
                                                'confmpass',
                                                Table::TYPE_TEXT,
                                                255,
                                                ['nullable'=>false,'default'=>'']
                                                )

                            ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}
 ?>
