<?php

namespace frontend\modules\api\controllers;


use common\models\Project;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class ProjectController extends ActiveController
{
    public $modelClass = Project::class;
}
