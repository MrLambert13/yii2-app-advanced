<?php

namespace backend\controllers;

use common\models\Project;
use yii\web\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
    /**
     * Displays homepage.
     * @return string
     */
    public function actionIndex() {
        $model = Project::findOne(1);
        var_dump($model->getSharedUsers()->select('username')->column());
        return $this->renderContent('Hello from Backend test page');
    }

}
