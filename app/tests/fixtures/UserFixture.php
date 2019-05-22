<?php

namespace app\tests\fixtures;
use yii\test\ActiveFixture;
use yii\db\Query;

class UserFixture extends ActiveFixture
{
    public $modelClass = 'Da\User\Model\User';
    public $dataFile = '@tests/_data/user.php';
}