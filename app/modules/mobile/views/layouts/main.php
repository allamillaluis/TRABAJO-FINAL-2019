<html>
<?php
use yii\helpers\Html;
use Yii;
echo $content;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
            <?php 
            //Detectar el dispositivo del Usuario
            if(!Yii::$app->devicedetect->isMobile()){ ?>
            Estas viendo la versión móvil en una PC, ir a versión de escritorio: <b>versi&oacute;n M&oacute;vil</b> (Ir a la versi&oacute;n de <?= Html::a(Html::img('@web/img/desktop.png', ['/turno/nuevo']).' Escritorio', '#') ?>)
            <?php } ?>

</html>