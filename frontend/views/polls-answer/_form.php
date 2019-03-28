<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PollsAnswer */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('@web/css/polls-answer/_form.css');
?>

<div class="polls-form">
    <!-- <label class="control-label" for="modelname-attributename"><h3>Apa Framework yang anda sukai?</h3></label> -->
    <div class="col-md-20 post" style="border-left: 1px dashed #ddd;min-height: 100vh;">
        <!--
            5 = sangat memuaskan
            4 = memuaskan
            3 = cukup memuaskan
            2 = kurang memuaskan
            1 = tidak memuaskan
        -->
        <center>
            <h3>Bagaimana tanggapan anda dengan artikel ini?</h3>
        </center>
        <br />
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <center>
                <?php $form = ActiveForm::begin(['action' => ['store-answer']]); ?>
                    <input name="answer" type="hidden" value="5" />
                    <button class="btn-emoticon" type="submit">&#128525</button>
                    <br />
                    Sangat Memuaskan
                <?php ActiveForm::end(); ?>
            </center>
        </div>
        <div class="col-sm-2">
            <center>
                <?php $form = ActiveForm::begin(['action' => ['store-answer']]); ?>
                    <input name="answer" type="hidden" value="4" />
                    <button class="btn-emoticon" type="submit">&#128516</button>
                    <br />
                    Memuaskan
                <?php ActiveForm::end(); ?>
            </center>
        </div>
        <div class="col-sm-2">
            <center>
                 <?php $form = ActiveForm::begin(['action' => ['store-answer']]); ?>
                    <input name="answer" type="hidden" value="3" />
                    <button class="btn-emoticon" type="submit">&#128559</button>
                    <br />
                    Cukup Memuaskan
                <?php ActiveForm::end(); ?>
            </center>
        </div>
        <div class="col-sm-2">
            <center>
                <?php $form = ActiveForm::begin(['action' => ['store-answer']]); ?>
                    <input name="answer" type="hidden" value="2" />
                    <button class="btn-emoticon" type="submit">&#128546</button>
                    <br />
                    Kurang Memuaskan
                <?php ActiveForm::end(); ?>
            </center>
        </div>
        <div class="col-sm-2">
            <center>
                <?php $form = ActiveForm::begin(['action' => ['store-answer']]); ?>
                    <input name="answer" type="hidden" value="1" />
                    <button class="btn-emoticon" type="submit">&#128545</button>
                    <br />
                    Tidak Memuaskan
                <?php ActiveForm::end(); ?>
            </center>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
