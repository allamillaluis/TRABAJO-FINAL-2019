<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'audit'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules'=>[
        'user' => [
            'class' => Da\User\Module::class,
            'administrators'=>$params['adminUser'],
            'classMap' => [
                'User' => app\models\User::class,
            ],        
        ],
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',
            'ignoreActions' => ['audit/*', 'debug/*'],
            'userIdentifierCallback' => ['app\models\User', 'userIdentifierCallback'],
            'userFilterCallback' => ['app\models\User', 'userFilterCallback'],            
            'accessIps' => ['*'],
            'logConfig'=>[
                'levels'=>YII_DEBUG?['error','warning','info','trace','profile']:['error','warning'],
            ],            'maxAge' => '14',
            'maxAge' => '14',
        ]
        
    ],  
    'components' => [
        'authManager'=>[
            'class'=>'Da\User\Component\AuthDbManagerComponent'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'T8vQydp7L2hC55E3go4XLFNsaNRdQYbZ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
        'generators' => [
            'fixture' => [
                'class' => 'elisdn\gii\fixture\Generator',
            ]
         ]        
    ];
}

return $config;
