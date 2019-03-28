<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PollsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polling';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Polling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'judul:ntext',
            //'question',
            [
                'header' => 'Pertanyaan',
                'attribute' => 'question',
            ],
            /*[
                'header'=>'Actions',
                'value' => function($model){
                    return Html::a($model->id, ['result', 'id'=>$model->id], ['class' => 'btn-sm btn-primary']);
                },
                'format' => 'html'
            ],*/
             [
                'header'=>'Actions',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{result} {delete}',
                'buttons'=>['result' => function ($url, $model) {    
                            return Html::a('Hasil', $url, ['title' => Yii::t('yii', 'Create'), 'class'=>'btn-sm btn-primary']);
                        },'delete' => function ($url, $model) {    
                            return Html::a('Hapus', $url, ['title' => Yii::t('yii', 'Delete'),'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),'data-method' => 'post', 'class'=>'btn-sm btn-danger']);
                        }
                ],
            ],
        ],
    ]); ?>

</div>
