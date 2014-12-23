<!doctype html>
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta charset="UTF-8">
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/public/assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/public/assets/js/bootstrap-transition.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl?>/public/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl?>/public/assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl?>/public/assets/css/override.css">
	<link rel="icon" href="<?php echo Yii::app()->request->baseUrl?>/public/assets/img/favicon.ico">
	<script type="text/javascript" src="<?php print Yii::app()->request->baseUrl;?>/public/assets/js/override.js"></script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
			<a class="brand"><?php echo Yii::app()->name;?></a>
				<?php
					$menu = array(
						array('label'=>'<i class="icon-home icon-white"></i> Home', 'url'=>array('/report/index')),
						array('label'=>'<i class="icon-white icon-pencil"></i> Laporkan Sesuatu!', 'url'=>array('/report/create')),
						array('label'=>'<i class="icon-lock icon-white"></i> Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'<i class="icon-lock icon-white"></i> Daftar', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'<i class="icon-home icon-white"></i> Kelola', 'url'=>array('/report/admin'),'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'<i class="icon-lock icon-white"></i> Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),				
					);

					$this->widget('zii.widgets.CMenu',array(
						'items'=>$menu,
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'nav'),
						));
			?>	
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="span11 offset1">
		<?php if(Yii::app()->user->hasFlash('info')):?>
			<br>
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo Yii::app()->user->getFlash('info');?></div>
		<?php endif;?>
		<?php echo $content; ?>
		</div>
	</div>
	<br>
	<div class="footer">
		<div class="container" id="footer-content">
		<small>
			recruitment challenge techgrid.co Jogja :D<br>
			<strong>&copy; 2014 galihazizy[at]gmail[dot]com</strong>
		</small>
		</div>
	</div>
</body>
</html>