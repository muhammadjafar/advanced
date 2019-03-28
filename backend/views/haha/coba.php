<?php

use pollext\poll\Poll;
use Yii\helpers\Html;
 ?>

<!-- END OF PAGE HEADER -->
<div id="contentpane" class="layout layout-center scroll" style="padding:15px;">
	<div class="alert" style="background:#eee;">
        <h5>Jajak Pendapat</h5>
        <p>
            Selamat datang di jajak pendapat. Silakan gunakan hak anda.</p>

            <h3> Apakah Framework Favorit anda?</h3>
            <input type="radio" name="pilihanmu" value="male"> Laravel<br>
            <br>
            <input type="radio" name="pilihanmu" value="male"> Yii2<br>
             <br>
            <input type="radio" name="pilihanmu" value="male"> CodeIgniter<br>
            <br>
            <br>
             <button type="submit" class="btn btn-submit btn-block">Submit</button>
    </div>
           <!--  <div class="form-group">
            	<?= Html::submitButton('Submit',['class' => 'btn btn-primary', 'name' => 'submit-button'])
            	?>
            </div> -->

    </div>

</div>
