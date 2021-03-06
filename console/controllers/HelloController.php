<?php

namespace console\controllers;


use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Site controller
 */
class HelloController extends Controller
{
    /**
     * Displays Hello World message.
     * @return string
     */
    public function actionIndex() {
        $this->stdout('Hello World from console' . PHP_EOL);
        return ExitCode::OK;
    }

}
