<?php
return [
    'id'=> 'tag',
    'migrationPath' => '@vendor/yuncms/tag/migrations',
    'translations' => [
        'yuncms/tag' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/yuncms/tag/messages',
        ],
    ],
    'backend' => [
        'class'=>'yuncms\tag\backend\Module'
    ],
    'frontend' => [
        'class'=>'yuncms\tag\frontend\Module'
    ],
];