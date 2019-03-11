<?php

use yii\db\ActiveRecord;

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
/*\yii\base\Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_VALIDATE, function (\yii\base\ModelEvent $e) {
    $e->isValid;
});*/
Yii::$container->set(
    \common\services\EmailInteface::class,
    \common\services\EmailService::class
);