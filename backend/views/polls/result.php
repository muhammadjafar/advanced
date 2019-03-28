<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Polls */

$this->title = 'Result';
$this->params['breadcrumbs'][] = ['label' => 'Polls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-create">

    <h1><?= $question ?></h1>
    <?php 
    for ($i=0; $i < count($data); $i++) { 
    	$result=0;
    	if($sum==0){

    	}else{
    		$result=round(($data[$i]['result']/$sum)*100, 0);
    	}
    ?>
    <?= $data[$i]['answer'];?>:
    <?= $data[$i]['result'];?> suara dari <?=$sum?> suara
    <div class="progress">
	  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow=""
	  aria-valuemin="0" aria-valuemax="100" style="width:<?=$result?>%">
	    <?=$result?>%
	  </div>
	</div>
    <?php
    }
    ?>


</div>
