<?php
/* @var $this ICODataController */
/* @var $model ICOData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'management_social_score'); ?>
		<?php echo $form->textField($model,'management_social_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advisors_social_score'); ?>
		<?php echo $form->textField($model,'advisors_social_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'social_chatter_score'); ?>
		<?php echo $form->textField($model,'social_chatter_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'science_advisors_long_hold_scale'); ?>
		<?php echo $form->textField($model,'science_advisors_long_hold_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_ico_price'); ?>
		<?php echo $form->textField($model,'pre_ico_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ico_price'); ?>
		<?php echo $form->textField($model,'ico_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_market_price'); ?>
		<?php echo $form->textField($model,'current_market_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advisor_linkedin'); ?>
		<?php echo $form->textField($model,'advisor_linkedin',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_url'); ?>
		<?php echo $form->textField($model,'logo_url',array('size'=>60,'maxlength'=>555)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->