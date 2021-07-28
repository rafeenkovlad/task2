<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php //var_dump($profiles); ?>
<?php foreach ($profiles as $profile): ?>
    <?= Html::encode($profile['lastname']) ?></br>
    <?= Html::encode($profile['firstname']) ?></br>
    <?= Html::encode($profile['secondname']) ?></br>
<ul>
    <?php foreach($profile['phone'] as $phone): ?>
        <li><?= Html::encode($phone) ?></li>
    <?php endforeach; ?>
</ul>
    <table><tr><td>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'profile_id')->hiddenInput(['value'=> $profile['id']])->label(false) ?>


                <div class="form-group">

                <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </td></tr><tr><td>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'phone')?>
                <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $profile['id']])->label(false) ?>


                <div class="form-group">

                <?= Html::submitButton('Добавить номер', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </td></tr></table>
    </br>
    </br>
<?php endforeach; ?>

