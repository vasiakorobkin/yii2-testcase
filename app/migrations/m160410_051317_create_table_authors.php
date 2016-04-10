<?php

use yii\db\Schema;
use yii\db\Migration;

class m160410_051317_create_table_authors extends Migration
{
    public function up()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(50)->notNull(),
            'lastname' => $this->string(50)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('authors');
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
