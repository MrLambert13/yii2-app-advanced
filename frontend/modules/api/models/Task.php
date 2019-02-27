<?php

namespace frontend\modules\api\models;

use common\models\User;

/**
 * {@inheritdoc}
 */
class Task extends \common\models\Task
{
    /**
     * @return array|false
     */
    public function extraFields() {
        /**
         * GET http://y2aa-frontend.test/api/tasks?expand=project
         */
        return [
            self::RELATION_PROJECT,
        ];
    }

    /**
     * @return array|false
     */
    public function fields() {
        return [
            'id',
            'title',
            'description_short' => function (Task $model) {
                //description_short (обрезанный до 50 символов description);
                //не ВЕРНУТЬ до 50 символов, а ОБРЕЗАТЬ до 50. Т.е. длина = 50
                return substr($model->description, 0, 50);
            }
        ];
    }

}
