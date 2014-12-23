<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#report-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Laporan Phenomenon yang tercatat</h4>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'htmlOptions'=>array('class'=>''),
	'id'=>'report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'itemsCssClass'=>'table table-bordered table-condensed table-hover sidemenu table-striped',
	'enablePagination'=>true,
	'pager'=>array(
				'class'=>'CLinkPager',
				'header'=>' ',
				'firstPageCssClass'=>'',
				'nextPageLabel'=>'>',
				'prevPageLabel'=>'<',
				'firstPageLabel'=>'<<',
				'lastPageLabel'=>'>>',
				'hiddenPageCssClass'=>'disabled',
				'selectedPageCssClass'=>'active',
				'htmlOptions'=>array('class'=>''),
				),
	'pagerCssClass'=>'pagination',
	'columns'=>array(
		'pengirim',
		array(
			'header'=>'Tanggal',
			'name'=>'dateposted',
			'value'=>'date_format(date_create($data->dateposted),"d M Y H:i:s")',
			),
		'judul',
		/*
		'dateposted',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
