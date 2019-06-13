<?php

namespace app\modules\mobile;

class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\mobile\controllers';
    public $layout =  '@app/modules/mobile/views/layouts/main';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
