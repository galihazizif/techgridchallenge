<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom bertanda <span class="required">*</span> harus terisi.</p>
	<?php if($model->hasErrors()):?>
	<div class="alert alert-danger">
		<?php echo $form->errorSummary($model); ?>
	</div>
	<?php endif;?>

	<div class="span7">
		<?php echo $form->labelEx($model,'judul'); ?>
		<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>100,'placeholder'=>'Judul..')); ?>
		<?php echo $form->error($model,'judul'); ?>
	</div>

	<div class="span4">
		<?php echo $form->labelEx($model,'berita'); ?>
		<?php echo $form->textArea($model,'berita',array('style'=>'width: 350px; height: 150px','placeholder'=>'Masukan kronologi kejadian disini..')); ?>
		<?php echo $form->error($model,'berita'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('class'=>'btn btn-warning')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<?php if($model->image != ''):?>
		<div class="span4">
			<img class="media-object pull-left img-polaroid" style="max-width: 200px" src="<?php echo Yii::app()->baseUrl.'/'.$model->image;?>">

		</div>
	<?php endif;?>

	<div class="span8">
		<?php echo $form->labelEx($model,'lokasi'); ?>
		<?php echo $form->textField($model,'lokasi',array('readonly'=>'readonly','placeholder'=>'Klik peta untuk mengambil koordinat','class'=>'span4')); ?>
		<?php echo $form->error($model,'lokasi'); ?>
	</div>

	<div class="img-polaroid span4 map-wrapper">
		<div id="map" style="height: 300px">Memuat peta dari raksasa Google..</div>		
		<button type="button" class="btn btn-mini btn-danger" style="display: none" id="openmap-btn" onClick="reloadMap()">Lokasi Kejadian Telah Dipilih. Ulangi?</button>
	</div>

	<div class="span9">
		<?php echo $form->labelEx($model,'pengirim'); ?>
		<?php echo $form->textField($model,'pengirim',array('size'=>30,'maxlength'=>30,'placeholder'=>'Email anda.')); ?>
		<?php echo $form->error($model,'pengirim'); ?>
	</div>

	<div class="span9">
	<?php $this->widget('CCaptcha',array(
			'buttonOptions'=>array('class'=>'btn','style'=>'margin-left: 3px'),
			'buttonLabel'=>'<i class="icon-refresh"><i>',
			'imageOptions'=>array('class'=>'img-polaroid')));?>
			<br>
		<?php echo $form->textField($model,'verifyCode',array('size'=>30,'maxlength'=>30,'placeholder'=>'Captcha')); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>

	<div class="span7 buttons">
		<a href="<?php echo $this->createUrl('/report/index');?>" class="btn btn-warning">Kembali</a>
		<input type="submit" value="Kirimkan" class="btn btn-primary">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>

	function tlokasi(id,koordinat){
		document.getElementById(id).value = koordinat;
	}

	function reloadMap(){
		$('#openmap-btn').hide();
		$('#map').show(200);
	}

	window.onload = function(){

		var mapProperties = {
			center:new google.maps.LatLng(-7.43098560365308,109.24697399139404),
			zoom:15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById("map"), mapProperties);

		google.maps.event.addListener(map,'click', function(event){
			var latitude = event.latLng.lat();
			var longitude = event.latLng.lng();
			tlokasi('Report_lokasi',latitude+';'+longitude);
			$('#map').hide(200);
			$('#openmap-btn').show();
		});
	}

</script>