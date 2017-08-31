<?php
/* @var $this ICOTokensController */
/* @var $model ICOTokens */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'icotokens-form',
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
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'token_name'); ?>
		<?php echo $form->textField($model,'token_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'token_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->