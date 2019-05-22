<?php

namespace app\tests\fixtures;
use yii\test\ActiveFixture;
use yii\db\Query;


class AssignmentFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Assignment';
    public $dataFile = '@tests/_data/assignment.php';
}