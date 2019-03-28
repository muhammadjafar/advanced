<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PollsResult */

$this->title = 'Update Polls Result: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Polls Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polls-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>