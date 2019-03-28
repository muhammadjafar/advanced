<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

//$cookies = Yii::$app->request->cookies;
//$sessionId= Yii::$app->getRequest()->getUserIP();
$this->title = 'Polling';
$this->params['breadcrumbs'][] = $this->title;
$sessionId= Yii::$app->session->getId();
?>
<?php 
	if ($cek == 1) {
		echo "<div class='alert alert-info'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <center>Terima kasih anda telah mengisi polling </center></div>";
	}else{


?>
<div class="panel panel-default">
	<div class="panel-body">
		<?php $form = ActiveForm::begin([
			'method' => 'post',
			'action'=> Url::to('save-poll'),
		]); ?>
		
			<h2><?=$model[0]['question']?></h2>
			<input type="hidden" name="poll" value="<?=$model[0]['id_poll']?>">
			<input type="hidden" name="cookies" value="<?=$sessionId;?>">
			<?php 
			$var=count($model);
			for ($i=0; $i < $var; $i++) {
			?>
			<div class="radio">
				<label><input type="radio" name="answer" value="<?php echo $model[$i]['id'];?>" required> <?php echo $model[$i]['answer'];?></label>
			</div>
			<?php 	
			}
			?>
			<br />
			<input name="result" type="submit" value="Kirim" class="btn btn-primary">
		
		<?php ActiveForm::end(); ?>
	</div>
</div>

<?php } ?>