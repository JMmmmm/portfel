<?php

use yii\db\Migration;

/**
 * Class m171214_114856_access
 */
class m171214_114856_access extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable ( '{{access}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
            'vacations_id' => $this->integer(),
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
        echo "m171214_114856_access cannot be reverted.\n";

        return false;
    }
    */
}
