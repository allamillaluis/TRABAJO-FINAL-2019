<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;

class TurnoController extends Controller
{
    public function actionNuevo()
    {
        return $this->render('nuevo');
    }
}
