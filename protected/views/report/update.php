<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h4>Sunting Laporan</h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>