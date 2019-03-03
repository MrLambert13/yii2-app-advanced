<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'description',
                'format' => 'ntext',
                'value' => function (\common\models\Task $model) {
                    return mb_substr($model->description, 0, 50);
                }
            ],
            [
                'attribute' => 'project_id',
                'value' => function (\common\models\Task $model) {
                    $project = \common\models\Project::find()->where(['id' => $model->id])->column();
                    var_dump($project);
                    return mb_substr($model->description, 0, 50);
                }
            ],

            'executor_id',
            'started_at',
            'completed_at',
            //'creator_id',
            'updater_id',
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
