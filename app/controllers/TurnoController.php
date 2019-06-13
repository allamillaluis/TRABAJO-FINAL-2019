<?php

namespace app\controllers;

class TurnoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNuevo()
    {
        return $this->render('nuevo');
    }

}
