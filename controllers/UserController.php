<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\{Profile, Phone, EntryForm};

class UserController extends Controller
{

    public function actionBuildlist()
    {
        $ids = Profile::find()->select(['id', 'lastname', 'firstname', 'secondname', 'updated_at'])->asArray()->all();
        foreach($ids as $id){
            $phone = Profile::findOne($id['id'])->phones;

            $phone = array_map(function($obj){
                return $obj->phone;
            },$phone);

            $profile[] = ['id'=>$id['id'], 'lastname' => $id['lastname'], 'firstname' =>$id['firstname'], 'secondname' => $id['secondname'], 'updated_at' => $id['updated_at'], 'phone' => $phone];

        }

        $model = new EntryForm();

        if($model->load(Yii::$app->request->post())){
            echo'</br></br></br></br>';
            if(isset($_POST['EntryForm']['profile_id'])):
                $phone = Phone::deleteAll(['id_user' => $_POST['EntryForm']['profile_id']]);
                $user = Profile::findOne($_POST['EntryForm']['profile_id'])->delete();
                var_dump([$phone, $user]);
            elseif(isset($_POST['EntryForm']['phone'])):
                $phone = new Phone();
                $phone->id_user = $_POST['EntryForm']['user_id'];
                $phone->phone = $_POST['EntryForm']['phone'];
                $phone->save();
                var_dump([$phone]);
            endif;

        }
        //$profiles = Profile::find()->orderBy('firstname')->all();

        return $this->render('buildlist', ['profiles' => $profile, 'model' => $model]);
    }



    /*public function actionEntry()
    {
        $model = new EntryForm();
        if($model->load(Yii::$app->request->post())){
            return $this->render('entry', ['model' => $model]);

        }
        return $this->render('entry', ['model' => $model]);
    }*/

}