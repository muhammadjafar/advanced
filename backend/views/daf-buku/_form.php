<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\DafBuku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daf-buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= 
   		 $form->field($model, 'kategori_id')->widget(Select2::classname(), [
    		'data' => $datkategori,
    		'options' => ['placeholder' => '- Pilih Kategori -'],
    		'pluginOptions' => [
       		'allowClear' => true
    ],
]);
    ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pengarang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_terbit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
