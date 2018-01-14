<?php

use yii\db\Migration;

/**
 * Class m171214_123816_foreign_keys
 */
class m171214_123816_foreign_keys extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_vacations', 'access', ['vacations_id'], 'vacations', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_vacations_category', 'vacations', ['category_id'], 'category', ['id'])->execute();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171214_123816_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
