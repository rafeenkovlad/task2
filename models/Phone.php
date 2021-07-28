<?php

namespace app\models;

use yii\db\ActiveRecord;

class Phone extends ActiveRecord
{
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'id_user']);
    }
}