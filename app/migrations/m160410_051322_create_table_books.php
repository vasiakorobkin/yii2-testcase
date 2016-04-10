<?php

use yii\db\Schema;
use yii\db\Migration;

class m160410_051322_create_table_books extends Migration
{
    public function up()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'date' => $this->date(),
            'date_create' => 'timestamp default CURRENT_TIMESTAMP',
            'date_update' => 'timestamp on update CURRENT_TIMESTAMP',
            'name' => $this->string(50)->notNull(),
            'preview' => $this->string(50)->notNull(),
        ]);
        $this->addForeignKey('fk_book_author',
                             'books', 'author_id',
                             'authors', 'id',
                             'NO ACTION','CASCADE');
    }

    public function down()
    {
        $this->dropTable('books');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
