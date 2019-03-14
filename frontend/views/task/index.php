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
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {take} {pass}',
                'buttons' => [
                    'take' => function ($url, \common\models\Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('hand-right');
                        Yii::$app->taskService->takeTask($model, Yii::$app->user->identity);
                        return Html::a($icon, ['view', 'id' => $model->id], ['data' => [
                            'confirm' => 'Do you take task?',
                            'method' => 'post',
                        ]]);
                    },
                    'pass' => function ($url, \common\models\Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('glyphicon-ok');
                        Yii::$app->taskService->canComplete($model);
                        return Html::a($icon, ['tasks'], ['data' => [
                            'confirm' => 'Do you complete task?',
                            'method' => 'post',
                        ]]);
                    }

                ],
                'visibleButtons' => [
                    'update' => function (\common\models\Task $model, $key, $index) {
                        return Yii::$app->taskService->canManage(\common\models\Project::findOne($model->project_id), Yii::$app->user->identity);
                    },
                    'delete' => function (\common\models\Task $model, $key, $index) {
                        return Yii::$app->taskService->canManage(\common\models\Project::findOne($model->project_id), Yii::$app->user->identity);
                    },
                    'take' => function (\common\models\Task $model, $key, $index) {
                        return Yii::$app->taskService->canTake($model, Yii::$app->user->identity);
                    },
                    'pass' => function (\common\models\Task $model, $key, $index) {
                        return Yii::$app->taskService->canComplete($model, Yii::$app->user->identity);
                    },
                ],
            ],
            [
                'attribute' => 'title',
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->project->title, ['project/view', 'id' => $model->project_id]);
                },
                'format' => 'html',
                //TODO фильтром со списком доступных проектов
            ],
            'title',
            [
                'attribute' => 'description',
                'value' => function (\common\models\Task $model) {
                    return mb_substr($model->description, 0, 50);
                },
                'format' => 'ntext',
            ],
            [
                'attribute' => 'Executor',
                'value' => function (\common\models\Task $model) {
                    if ($model->executor) {
                        return Html::a($model->executor->username, ['user/view', 'id' => $model->executor_id]);
                    }
                    return 'empty';
                },
                'format' => 'html'
                //TODO фильтрами в виде списка всех активных пользователей (используйте onlyActive из 2б)
            ],
            'started_at:datetime',
            'completed_at:datetime',
            [
                'attribute' => 'Creator',
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->creator->username, ['user/view', 'id' => $model->creator_id]);
                },
                'format' => 'html',
                //TODO фильтрами в виде списка всех активных пользователей (используйте onlyActive из 2б)

            ],
            'updater.username:text:Updater',
            'created_at:datetime',
            'updated_at:datetime',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
