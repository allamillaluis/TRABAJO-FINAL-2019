<?php

use yii\db\Migration;

/**
 * Class m190305_193748_roladmin
 */
class m190305_193748_roladmin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $auth->add($admin);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190305_193748_roladmin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190305_193748_roladmin cannot be reverted.\n";

        return false;
    }
    */
}
