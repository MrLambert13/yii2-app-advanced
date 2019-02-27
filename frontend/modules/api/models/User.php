<?php

namespace frontend\modules\api\models;

/**
 * {@inheritdoc}
 */
class User extends \common\models\User
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedTasks() {
        return $this->hasMany(Task::className(), ['creator_id' => 'id']);
    }

    /**
     * @return array|false
     */
    public function extraFields() {
        return [
            //GET http://y2aa-frontend.test/api/users?expand=createdTasks
            self::RELATION_CREATED_TASKS,
            //GET http://y2aa-frontend.test/api/users?expand=activedTasks
            self::RELATION_ACTIVED_TASKS,
            //GET http://y2aa-frontend.test/api/users?expand=updatedTasks
            self::RELATION_UPDATED_TASKS,
            //GET http://y2aa-frontend.test/api/users?expand=createdProjects
            self::RELATION_CREATED_PROJECTS,
            //GET http://y2aa-frontend.test/api/users?expand=updatedProjects
            self::RELATION_UPDATED_PROJECTS,

        ];
    }

    /**
     * @return array|false
     */
    public function fields() {
        return [
            'username', 'email'
        ];
    }

}
