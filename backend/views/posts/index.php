<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?php 
        Pjax::begin();
   ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'author_id',
            'title',
            [
                'attribute' => 'date',
                'filter' => DatePicker::widget([
                       'model' => $searchModel,
                       'attribute' => 'date',  
                        'options' => ['placeholder' => 'masukkan tanggal'],
                        'pluginOptions' => [
                            'todayHighlight' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                ])
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php 
    Pjax::end();
    ?>
</div>
