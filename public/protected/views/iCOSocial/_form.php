<?php
/* @var $this ICOSocialController */
/* @var $model ICOSocial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'icosocial-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ico_company_id'); ?>
		<?php echo $form->textField($model,'ico_company_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ico_company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telegram_channel'); ?>
		<?php echo $form->textField($model,'telegram_channel',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telegram_channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slack_channel'); ?>
		<?php echo $form->textField($model,'slack_channel',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'slack_channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'linkedin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->