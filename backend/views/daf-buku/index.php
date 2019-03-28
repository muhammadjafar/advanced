<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daf Bukus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daf-buku-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Daf Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => 'true',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'kategori_id', 
                'value' => 'kategori.nama',
                'filter' => Html::dropDownList('kategori_id', Yii::$app->request->get('kategori_id'), $datkategori,['class' => 'form-control','prompt'=>'- Pilih Kategori -'])

            ], 
            [
            'attribute' => 'judul', 
                'filter' => Html::textInput('judul', Yii::$app->request->get('judul'),['class' => 'form-control']),

            ], 
            [
            'attribute' => 'pengarang', 
                'filter' => Html::textInput('pengarang', Yii::$app->request->get('pengarang'),['class' => 'form-control']),

            ], 
             [
            'attribute' => 'tahun_terbit', 
                'filter' => Html::textInput('tahun_terbit', Yii::$app->request->get('tahun_terbit'),['class' => 'form-control']),

            ], 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>
</div>
