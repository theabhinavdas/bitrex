<?php
/* @var $this ICODataController */
/* @var $data ICOData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('management_social_score')); ?>:</b>
	<?php echo CHtml::encode($data->management_social_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advisors_social_score')); ?>:</b>
	<?php echo CHtml::encode($data->advisors_social_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('social_chatter_score')); ?>:</b>
	<?php echo CHtml::encode($data->social_chatter_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('science_advisors_long_hold_scale')); ?>:</b>
	<?php echo CHtml::encode($data->science_advisors_long_hold_scale); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_ico_price')); ?>:</b>
	<?php echo CHtml::encode($data->pre_ico_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ico_price')); ?>:</b>
	<?php echo CHtml::encode($data->ico_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_market_price')); ?>:</b>
	<?php echo CHtml::encode($data->current_market_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advisor_linkedin')); ?>:</b>
	<?php echo CHtml::encode($data->advisor_linkedin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_url')); ?>:</b>
	<?php echo CHtml::encode($data->logo_url); ?>
	<br />

	*/ ?>

</div>