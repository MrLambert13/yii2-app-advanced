<?php

namespace frontend\modules\api\models;


/**
 * {@inheritdoc}
 */
class Project extends \common\models\Project
{
    /**
     * @return array|false
     */
    public function extraFields() {
        /**
         * GET http://y2aa-frontend.test/api/projects?expand=tasks
         */
        return [
            self::RELATION_TASKS,
        ];
    }

    /**
     * @return array|false
     */
    public function fields() {
        return [
            'id',
            'title',
            'description_short' => function (Project $model) {
                //description_short (обрезанный до 50 символов description);
                //не ВЕРНУТЬ до 50 символов, а ОБРЕЗАТЬ до 50. Т.е. длина = 50
                return substr($model->description, 0, 50);
            },
            'active'
        ];
    }

}
