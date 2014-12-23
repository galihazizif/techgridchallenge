<?php
/* @var $this ReportController */
/* @var $data Report */
?>

<div class="view v_item">
	<p><a href="<?php echo $this->createUrl('report/view',array('id'=>$data->id));?>"><?php echo $data->judul?></a>
	<br><small><?php echo date_format(date_create($data->dateposted),'D, d M Y - H:i:s');?></small></p>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>