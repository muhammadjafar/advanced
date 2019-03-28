<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Polls;
use backend\models\PollsSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Polls */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polls-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'judul')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 2]) ?>
    <label>Answer</label>
    <?php for ($i=0; $i < count($modul); $i++) { ?>
        <div class="input-group" id="<?= $i;?>">
          <input type="text" class="form-control" aria-describedby="basic-addon2" value='<?=$modul[$i]['answer']?>'>
          <span class="input-group-addon glyphicon glyphicon-trash" id="basic-addon2" onclick="hilang(<?= $i?>)"></span>
        </div><br>
    <?php
        //echo "<input type='text' value=".$modul[$i]['answer']." class='form-control'> <br>";
    }
    ?>
    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Answer </h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPollsAnswer[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'answer',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPollsAnswer as $i => $modelPollsAnswer): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Answer</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelPollsAnswer->isNewRecord) {
                                echo Html::activeHiddenInput($modelPollsAnswer, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPollsAnswer, "[{$i}]answer")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    function hilang(id){
        $('#'+id).hide();
        //alert(id);
    }
</script>