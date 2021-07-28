<?php

namespace app\models;

use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{

    public function getPhones()
    {
        return $this->hasMany(Phone::class, ['id_user' => 'id']);
    }

}