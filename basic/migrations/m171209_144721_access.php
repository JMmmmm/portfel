<?php

use yii\db\Migration;

/**
 * Class m171209_144721_access
 */
class m171209_144721_access extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable ('{{access}}', [
            'id' => $this->primaryKey(),
            'note_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),

            ]
       
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{access}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171209_144721_access cannot be reverted.\n";

        return false;
    }
    */
}
