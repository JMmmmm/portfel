<?php

use yii\db\Migration;

/**
 * Class m171214_113809_vacations
 */
class m171214_113809_vacations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable ( '{{vacations}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'company' => $this->string(),
            'town' => $this->string(),
            'descript' => $this->text()->notNull(),
            'phone' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'access' => $this->smallInteger()->notNull()->defaultValue(0),
            'category_id' => $this->integer(),
            'img_address' => $this->string(),
        ]
            
            );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{vacations}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171214_113809_vacations cannot be reverted.\n";

        return false;
    }
    */
}
