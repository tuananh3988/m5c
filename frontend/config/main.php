<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => 'site',
    'modules' => [],
    'language' => 'en',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Users',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'site/login',
                'logout' => 'site/logout',
            ],
        ],
//        
//        'request' => [
//            'baseUrl' => '/user',
//            'enableCookieValidation' => true,
//            'enableCsrfValidation' => true,
//            'cookieValidationKey' => 'xxxxxxx',
//        ],
        
    ],
    'params' => $params,
];
