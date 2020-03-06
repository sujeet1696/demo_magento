<?php
namespace First\Blog\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('first_blogs');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
            ->addColumn( 'id', Table::TYPE_INTEGER, null,
                  ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true])
             ->addColumn('user_name', Table::TYPE_TEXT, 255, ['nullable'=>true])
             ->addColumn( 'email_id', Table::TYPE_TEXT, 100,
                        ['nullable'=>false,'default'=>''] )
             ->addColumn( 'phone_number', Table::TYPE_TEXT, 20,
                        ['nullable'=>true,'default'=>''] )
            ->addColumn(
                'title',
                Table::TYPE_TEXT,
                255,
                ['default'=>'No title'] )
            ->addColumn(
                'description',
                Table::TYPE_TEXT,
                1024,
                ['nullable'=>true]
                )
            ->addColumn(
              'blog_type',
              Table::TYPE_SMALLINT,
              3,
              ['nullable' => false, 'default'=> 1])
            ->addColumn(
                'status',
                Table::TYPE_BOOLEAN,
                null,
                ['nullable' => false, 'default'=> 1],
                'true -> active, false -> inactive'
                )
            ->addColumn(
                'created_at',
                Table::TYPE_DATETIME,
                null,
                ['nullable'=>true]
                )
            ->addColumn(
                'updated_at',
                Table::TYPE_DATETIME,
                null,
                ['nullable'=>true]
                )
            ->addIndex(
                $setup->getTable('first_blogs'),
                ['email_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
            )
          ->setOption('charset','utf8');
        $conn->createTable($table);
        }
        $setup->endSetup();
    }
}
 ?>
