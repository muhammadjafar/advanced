<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Polls */

$this->title = 'Update Polls: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Polls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polls-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form', [
        'model' => $model,
        'modul' => $modul,
        'modelsPollsAnswer' => $modelsPollsAnswer,
    ]) ?>

</div>
