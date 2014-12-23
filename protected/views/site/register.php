<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<h4>Daftar sekarang, pengguna yang terdaftar dapat menghapus dan menyunting laporan</h4>
<div class="span7">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-register-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<?php if($model->hasErrors()): ?>
		<div class="alert alert-danger">
			<?php echo $form->errorSummary($model); ?>
		</div>
	<?php endif;?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('placeholder'=>'Masukkan email anda')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emailVerify'); ?>
		<?php echo $form->textField($model,'emailVerify',array('placeholder'=>'Ulangi email')); ?>
		<?php echo $form->error($model,'emailVerify'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'Masukkan Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passwordVerify'); ?>
		<?php echo $form->passwordField($model,'passwordVerify',array('placeholder'=>'Ulangi password')); ?>
		<?php echo $form->error($model,'passwordVerify'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Daftar Sekarang !',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->