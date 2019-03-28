<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PollsAnswer */

$this->title = 'Create Polls Answer';
$this->params['breadcrumbs'][] = ['label' => 'Polls Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
