<?php
/* @var $this ReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reports',
	);

	?>

	<div class="span5">
		<h4><h1>Tuliskan</h1> Kejadian yang terjadi disekitar anda, fenomena alam, fenomena sosial, bahkan fenomena alay.</h4>
		<br><a href="<?php echo $this->createUrl('report/create');?>" class="btn btn-primary">Mulai !</a>
	</div>

	<div class="well span7 media">
		<p class="label-warning label pull-right">Laporan Terbaru</p>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'pager'=>array(
				'class'=>'CLinkPager',
				'maxButtonCount'=>4,
				'header'=>' ',
				'firstPageCssClass'=>'',
				'nextPageLabel'=>'>',
				'prevPageLabel'=>'<',
				'firstPageLabel'=>'<<',
				'lastPageLabel'=>'>>',
				'hiddenPageCssClass'=>'disabled',
				'selectedPageCssClass'=>'active',
				'htmlOptions'=>array('class'=>'')),
			'pagerCssClass'=>'pagination span6',
			)); ?>
		</div>
