<?php

namespace frontend\modules\api\models;

use common\models\ProjectUser;
use common\models\User;

/**
 * This is the model class for table "project".
 * @property int           $id
 * @property string        $title
 * @property string        $description
 * @property int           $active
 * @property int           $creator_id
 * @property int           $updater_id
 * @property int           $created_at
 * @property int           $updated_at
 * @property User          $creator
 * @property User          $updater
 * @property ProjectUser[] $projectUsers
 */
class Project extends \common\models\Project
{
    public function extraFields() {
        return parent::extraFields(); // TODO: Change the autogenerated stub
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
