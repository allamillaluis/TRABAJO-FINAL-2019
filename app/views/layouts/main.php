<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
 <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Home', 'url' => ['/site/index']
            ],
            (Yii::$app->hasModule('gii'))?
            [
                'label'=>'Gii',
                'visible'=>Yii::$app->user->can('admin'),
                'url'=>['/gii']
            ]:'',            
            [
                'label'=>'Auditoría',
                'url'=>'/audit',
                'visible'=>Yii::$app->user->can('admin')
            ],
            [
                'label'=>'Usuarios',
                'url'=>'/user/admin/index',
                'visible'=>Yii::$app->user->can('admin')
            ],
            [
                'label'=>'Tablas de Sistema',
                'url'=>'#',
                'visible'=>Yii::$app->user->can('admin'),
                'items'=>[
                ]
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    'Desconectarse  (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            
        ],
    ]);
    NavBar::end();
    ?>
    
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">
            <?php 
            //Detectar el dispositivo del Usuario
            if(Yii::$app->devicedetect->isMobile()){ ?>
            Estas utilizando un dispositivo móvil, ir a versión móvil: <b>versi&oacute;n M&oacute;vil</b> (Ir a la versi&oacute;n de <?= Html::a(Html::img('@web/img/mobile.png', ['/mobile/turno/nuevo']).' Escritorio', '#') ?>)
            <?php } ?>
        </p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
