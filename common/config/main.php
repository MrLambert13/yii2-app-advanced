<?php

use common\services\EmailService;
use common\services\NotificationService;
use common\services\ProjectService;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'projectService' => [
            'class' => ProjectService::class,
            'on ' . ProjectService::EVENT_ASSIGN_ROLE => function (\common\services\AssignRoleEvent $e) {
                //Yii::info(ProjectService::EVENT_ASSIGN_ROLE, '_');
                //$views = ['html' => 'assignRoleToProject-html', 'text' => 'assignRoleToProject-text'];
                //$data = ['user' => $e->user, 'project' => $e->project, 'role' => $e->role];
                //Yii::$app->emailService->send($e->user->email, 'New role ' . $e->role, $views, $data);

                Yii::$app->notificationService->sendAboutNewProjectRole($e->user, $e->project, $e->role);
            }
        ],
        'notificationService' => [
            'class' => NotificationService::class,

        ],
        'emailService' => [
            'class' => EmailService::class,

        ],
    ],
    'modules' => [
        'chat' => [
            'class' => common\modules\chat\Module::class,
        ],
    ],
];
