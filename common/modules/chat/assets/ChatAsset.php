<?php
/**
 * Created by PhpStorm.
 * User: Lam_1
 * Date: 24.02.2019
 * Time: 14:32
 */

namespace common\modules\chat\assets;


use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/chat.css'
    ];

    public $js = [
        '/js/chat.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
