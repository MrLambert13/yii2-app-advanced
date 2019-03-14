<?php

namespace common\services;


use common\models\Project;
use common\models\ProjectUser;
use common\models\Task;
use common\models\User;
use Yii;
use yii\base\Component;

class TaskService extends Component
{
    /**
     * Проверяющий может ли пользователь управлять задачами в проекте - может если он менеджер в проекте,
     * используйте hasRole() из ProjectService
     *
     * @param Project $project
     * @param User    $user
     *
     * @return bool
     */
    public function canManage(Project $project, User $user) {
        return Yii::$app->projectService->hasRole($project, $user, ProjectUser::ROLE_MANAGER);
    }

    /**
     * Проверяющий может ли пользователь взять задачу в работу - может если он девелопер в проекте (используйте
     * hasRole() из ProjectService), и поле executor_id у задачи пустое.
     *
     * @param Task $task
     * @param User $user
     *
     * @return bool
     */
    public function canTake(Task $task, User $user) {
        $idAccessToTask = Yii::$app->projectService->hasRole(Project::findOne($task->project_id), $user, ProjectUser::ROLE_DEVELOPER);
        $isFreeTask = !($task->executor_id);
        return $idAccessToTask && $isFreeTask;
    }

    /**
     * Проверяющий может ли пользователь закончить работу - может если ид пользователя в поле executor_id у задачи и
     * поле completed_at у задачи пустое.
     *
     * @param Task $task
     * @param User $user
     *
     * @return bool
     */
    public function canComplete(Task $task, User $user) {
        return (($task->executor_id === $user->id) && !($task->completed_at));
    }

    /**
     * взять задачу в работу - изменяем start_at и executor_id и возвращаем результат сохранения.
     *
     * @param Task $task
     * @param User $user
     */
    public function takeTask(Task $task, User $user) {

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $task->started_at = time();
            $task->executor_id = $user->id;
            $task->save();
            Yii::$app->session->setFlash('success', 'Task "' . $task->title . '" was take!');
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollback();
            Yii::$app->session->setFlash('warning', 'Dear friend. Task "' . $task->title . '" was not take! Please try later. We so sorry. =(');
        }
    }

    /**
     * закончить работу - изменяем completed_at и возвращаем результат сохранения.
     *
     * @param Task $task
     */
    public function completeTask(Task $task) {
        $task->completed_at = time();
        $task->save();
        Yii::$app->session->setFlash('success', 'Task "' . $task->title . '" was complete!');
    }
}