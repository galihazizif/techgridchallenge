<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'linkLabelWrapper'=>'span',
			'encodeLabel'=>false,
			'linkLabelWrapperHtmlOptions'=>array('class'=>'btn'),
			'htmlOptions'=>array('class'=>'sidemenu'),
		));
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>