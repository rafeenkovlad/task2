<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'profile_id')->hiddenInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>