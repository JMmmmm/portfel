<?php

use yii\db\Migration;

/**
 * Class m171214_114824_category
 */
class m171214_114824_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable ( '{{category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]
            
            );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{category}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171214_114824_category cannot be reverted.\n";

        return false;
    }
    */
}
