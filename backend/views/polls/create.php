<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Polls */

$this->title = 'Buat Polling';
$this->params['breadcrumbs'][] = ['label' => 'Polls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPollsAnswer' => $modelsPollsAnswer,
    ]) ?>

</div>
