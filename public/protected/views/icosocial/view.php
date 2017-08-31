<?php
/* @var $this ICOSocialController */
/* @var $model ICOSocial */

$this->breadcrumbs=array(
	'Icosocials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ICOSocial', 'url'=>array('index')),
	array('label'=>'Create ICOSocial', 'url'=>array('create')),
	array('label'=>'Update ICOSocial', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ICOSocial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ICOSocial', 'url'=>array('admin')),
);
?>

<h1>View ICOSocial #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ico_company_id',
		'telegram_channel',
		'slack_channel',
		'linkedin',
	),
)); ?>
