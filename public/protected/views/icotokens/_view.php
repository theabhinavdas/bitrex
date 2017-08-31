<?php
/* @var $this ICOTokensController */
/* @var $data ICOTokens */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ico_company_id')); ?>:</b>
	<?php echo CHtml::encode($data->ico_company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('token_name')); ?>:</b>
	<?php echo CHtml::encode($data->token_name); ?>
	<br />


</div>