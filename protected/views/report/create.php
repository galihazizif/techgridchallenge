<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Create',
);

?>

<h4>Laporkan Kejadian Disekitar Anda</h4>
<p>Anda dapat menuliskan berbagai macam kejadian seperti banjir, gempa bumi, gelombang panas dll agar informasi dapat langsung tersebar</p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>