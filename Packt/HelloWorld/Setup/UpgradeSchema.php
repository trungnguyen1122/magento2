<?php
namespace Packt\HelloWorld\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface {
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.1') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
//Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie')
            )->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Movie Id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],

                'Name Movie'
            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Description Movie'
            )->addColumn(
                'rating',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                64,
                ['nullable' => false],
                'Rating Movie'
            )->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                255,
                [   'nullable' => false,

                    'unsigned' => true,
                ],
                'Director_Id'
            )->addIndex(
                $installer->getIdxName('magenest_movie',
                    ['movie_id']),
                ['movie_id','name','description','rating','director_id']
            )->addForeignKey(
                $installer->getFkName('magenest_movie','director_id','magenest_director','director_id'),'director_id',
                $installer->getTable('magenest_director'),'director_id'
            )->setComment(
                'Post Table'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
///Director
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_director')
            )->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Director Id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],

                'Name Director'
            )->addIndex(
                $installer->getIdxName('magenest_director',
                    ['director_id']),
                ['director_id','name']
            )->setComment(
                'Post Table'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();

///Actor
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_actor')
            )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Actor Id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],

                'Name Actor'
            )->addIndex(
                $installer->getIdxName('magenest_actor',
                    ['actor_id']),
                ['actor_id','name']
            )->setComment(
                'Post Table'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
///Movie_actor
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie_actor')
            )->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[

                'unsigned' => true,
                'nullable' => false
            ],
                'Movie Id'
            )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'unsigned' => true,
                'nullable' => false
            ],
                'Actor Id'
            )->addIndex(
                $installer->getIdxName('magenest_movie_actor',
                    ['movie_id']),
                ['movie_id','actor_id']
            )->addForeignKey(
                $installer->getFkName('magenest_movie_actor','movie_id','magenest_movie','movie_id'),'movie_id',
                $installer->getTable('magenest_movie'),'movie_id'
            )->addForeignKey(
                $installer->getFkName('magenest_movie_actor','actor_id','magenest_actor','actor_id'),'actor_id',
                $installer->getTable('magenest_actor'),'actor_id'
            )->setComment(
                'Post Table'
            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();



        }
    }
}