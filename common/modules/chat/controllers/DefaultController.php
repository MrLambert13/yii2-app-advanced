<?php

namespace common\modules\chat\controllers;

use common\modules\chat\components\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use yii\console\Controller;
use Ratchet\Server\IoServer;

/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    public function actionIndex() {

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            8080
        );

        echo 'server start';
        $server->run();
        echo 'server stop';

    }
}
