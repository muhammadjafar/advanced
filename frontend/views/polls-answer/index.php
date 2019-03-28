<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PollsAnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polls Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-answer-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('start Polls Answer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="bar_chart" data-url="<?= Url::to(['polls-answer/index-ajax-bar-chart']) ?>"></div>
    <div id="pie_chart" data-url="<?= Url::to(['polls-answer/index-ajax-pie-chart']) ?>"></div>
    

</div>

 <?php
$this->registerJsFile('https://code.highcharts.com/highcharts.js', ['depends' => [JqueryAsset::className()], 'position' => View::POS_END]);
$this->registerJsFile('@web/js/polls-answer/index.js', ['depends' => [JqueryAsset::className()], 'position' => View::POS_END]);
?> 
