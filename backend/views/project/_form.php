<?php

use common\models\Project;
use unclead\multipleinput\MultipleInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => ['label' => 'col-sm-2',]
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList(Project::STATUS_LABELS) ?>



    <?php if (!$model->isNewRecord): ?>
        <?= $form->field($model, Project::RELATION_PROJECT_USERS)
            ->widget(MultipleInput::className(), [
                //https://github.com/unclead/yii2-multiple-input

                'max' => 10,
                'min' => 0,
                'addButtonPosition' => MultipleInput::POS_HEADER,
                'columns' => [
                    [
                        'name' => 'project_id',
                        'type' => 'hiddenInput',
                        'defaultValue' => $model->id,
                    ],
                    [
                        'name' => 'user_id',
                        'type' => 'dropDownList',
                        'title' => 'User',
                        'items' => \common\models\User::find()->select('username')->indexBy('id')->column(),
                        //TODO перенести выборку юзеров в контроллер
                    ],
                    [
                        'name' => 'role',
                        'type' => 'dropDownList',
                        'title' => 'Role',
                        'items' => \common\models\ProjectUser::ROLES,
                    ],
                ]
            ]); ?>
    <?php endif; ?>

    <?php //TODO помножить кнопку везде такую; ?>
  <div class="row">
    <div class="col-md-2 col-md-offset-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
  </div>
    <?php ActiveForm::end(); ?>

</div>
