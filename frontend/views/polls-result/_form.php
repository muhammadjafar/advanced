<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PollsResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polls-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_answer')->textInput() ?>

    <?= $form->field($model, 'id_polls')->textInput() ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
