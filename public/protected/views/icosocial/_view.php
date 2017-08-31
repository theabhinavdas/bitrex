<?php
/* @var $this ICOSocialController */
/* @var $data ICOSocial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ico_company_id')); ?>:</b>
	<?php echo CHtml::encode($data->ico_company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telegram_channel')); ?>:</b>
	<?php echo CHtml::encode($data->telegram_channel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slack_channel')); ?>:</b>
	<?php echo CHtml::encode($data->slack_channel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkedin')); ?>:</b>
	<?php echo CHtml::encode($data->linkedin); ?>
	<br />


</div>