<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Polling';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-polling">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       Selamat datang di jajak pendapat. Silakan gunakan hak anda.
    </p>

    <div class="row">
        <div class="col-lg-5">
           <h3> Apakah Framework Favorit anda?</h3>
           <?
            <!-- <input type="radio" name="pilihanmu" value="male"> Laravel<br>
            <br>
            <input type="radio" name="pilihanmu" value="male"> Yii2<br>
             <br>
            <input type="radio" name="pilihanmu" value="male"> CodeIgniter<br>
            <br> -->
            <br>
           <!--   <button type="submit" class="btn btn-submit btn-block">Submit</button>
    </div> -->

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

           
        </div>
    </div>

</div>
