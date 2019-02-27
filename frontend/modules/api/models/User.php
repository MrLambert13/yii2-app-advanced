<?php

namespace frontend\modules\api\models;

/**
 * User model
 * @property integer $id
 * @property string  $username
 * @property string  $password_hash
 * @property string  $password_reset_token
 * @property string  $email
 * @property string  $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string  $password write-only password
 * @property Task[]  $createdTasks
 * @property Task[]  $activedTasks
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
            self::RELATION_CREATED_TASKS,
            self::RELATION_ACTIVED_TASKS,

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
