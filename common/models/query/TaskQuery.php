<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Task]].
 * @see \common\models\Task
 */
class TaskQuery extends \yii\db\ActiveQuery
{
    /**
     * @param $userId integer
     *
     * @return mixed
     */
    public function byCreator($userId) {
        return $this->andWhere(['creator_id' => $userId]);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Task[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Task|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}
