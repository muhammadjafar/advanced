<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PollsAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polls-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_poll')->textInput() ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
