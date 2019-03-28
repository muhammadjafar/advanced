<?php

use yii\helpers\Html;
?>
<?php
foreach ($model as $model) {
?>
<?php 
	if(Yii::$app->session->hasFlash('success')){
		echo Yii::$app->session->getFlash('success');
	}
?>
<div class="panel panel-default">
	<div class="panel-body">
	<p><?php echo $model->judul;?></p>
		
	<p><?php echo $model->question;?></p>
	<?= Html::a('mulai poling',['isi-poling', 'id'=>$model->id],['class'=>'btn btn-primary']) ?>
	</div>
</div>
<?php
}
?>