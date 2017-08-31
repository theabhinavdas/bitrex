<?php
/* @var $this ICODataController */
/* @var $model ICOData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'icodata-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'management_social_score'); ?>
		<?php echo $form->textField($model,'management_social_score'); ?>
		<?php echo $form->error($model,'management_social_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advisors_social_score'); ?>
		<?php echo $form->textField($model,'advisors_social_score'); ?>
		<?php echo $form->error($model,'advisors_social_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_chatter_score'); ?>
		<?php echo $form->textField($model,'social_chatter_score'); ?>
		<?php echo $form->error($model,'social_chatter_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'science_advisors_long_hold_scale'); ?>
		<?php echo $form->textField($model,'science_advisors_long_hold_scale'); ?>
		<?php echo $form->error($model,'science_advisors_long_hold_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_ico_price'); ?>
		<?php echo $form->textField($model,'pre_ico_price'); ?>
		<?php echo $form->error($model,'pre_ico_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ico_price'); ?>
		<?php echo $form->textField($model,'ico_price'); ?>
		<?php echo $form->error($model,'ico_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_market_price'); ?>
		<?php echo $form->textField($model,'current_market_price'); ?>
		<?php echo $form->error($model,'current_market_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advisor_linkedin'); ?>
		<?php echo $form->textField($model,'advisor_linkedin',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'advisor_linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_url'); ?>
		<?php echo $form->textField($model,'logo_url',array('size'=>60,'maxlength'=>555)); ?>
		<?php echo $form->error($model,'logo_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->