<?php

/* @var $this yii\web\View
 * @var $content array
 */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>

  <h3>Выполненые домашние задания:</h3>
  <ol>
      <?php foreach ($content as $idx => $item): ?>
        <li>
            <?= Html::a('Урок №' . ($idx + 1), $item) ?>
        </li>
      <?php endforeach; ?>
  </ol>


</div>
