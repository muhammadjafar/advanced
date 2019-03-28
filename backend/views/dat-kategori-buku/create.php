<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DatKategoriBuku */

$this->title = 'Create Dat Kategori Buku';
$this->params['breadcrumbs'][] = ['label' => 'Dat Kategori Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dat-kategori-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>