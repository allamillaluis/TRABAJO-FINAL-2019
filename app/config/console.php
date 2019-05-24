<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'authManager'=>[
            'class'=>'Da\User\Component\AuthDbManagerComponent'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    'controllerMap' => [
            'fixture' => [
                'class' => 'yii\console\controllers\FixtureController',
                'namespace' => 'app\tests\fixtures'
            ],
            'migrate' => [
                'class' => \yii\console\controllers\MigrateController::class,
                'migrationPath' => [
                    '@app/migrations',
                    '@yii/rbac/migrations', // Just in case you forgot to run it on console (see next note)
                    '@bedezign/yii2/audit/migrations'
                ],
                'migrationNamespaces' => [
                    'Da\User\Migration',
                ],                
            ],        
        ]];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
