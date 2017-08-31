<?php
/* @var $this ICODataController */
/* @var $model ICOData */

$this->breadcrumbs=array(
	'Icodatas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ICOData', 'url'=>array('index')),
	array('label'=>'Create ICOData', 'url'=>array('create')),
	array('label'=>'Update ICOData', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ICOData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ICOData', 'url'=>array('admin')),
);
?>

<h1>View ICOData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'management_social_score',
		'advisors_social_score',
		'social_chatter_score',
		'science_advisors_long_hold_scale',
		'pre_ico_price',
		'ico_price',
		'current_market_price',
		'advisor_linkedin',
		'logo_url',
	),
)); ?>
