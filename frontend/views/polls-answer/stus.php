<?php
$this->breadcrumbs=array(
	'Chart'=>array('index'),
	'Statistik Pengguna',
);

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinstrument-form',
	'enableAjaxValidation'=>false,
)); ?>
<center>
?>
<?php
$label=array();
$nilai=array();

foreach($dataProvider->getData() as $i=>$ii)
{
    $label[$i]=$ii['aa'];
    $nilai[$i]=(int)$ii['count(id)'];
}

$this->widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
     'chart'=> array('defaultSeriesType'=>'column',),
      'title' => array('text' => ''),
      'legend'=>array('enabled'=>false),
      'xAxis'=>array('categories'=>$label,
			'title'=>array('text'=>''),),
      'yAxis'=> array(
            'min'=> 0,
            'title'=> array(
            'text'=>'Jumlah'
            ),
        ),
      'series' => array(
         array('data' => $nilai)
      ),
      'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
      'tooltip' => array(
		'formatter' => 'js:function() {return "<b>"+ this.x +"</b><br/>"+"Jumlah : "+ this.y; }'
      ),
      'plotOptions'=>array('pie'=>(array(
                    'allowPointSelect'=>true,
                    'showInLegend'=>true,
                    'cursor'=>'pointer',
                )
            )                       
        ),
      'credits'=>array('enabled'=>false),
   )
));

?>
</center>
<?php $this->endWidget(); ?>