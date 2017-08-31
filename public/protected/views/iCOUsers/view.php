<?php
/* @var $this ICOUsersController */
/* @var $model ICOUsers */

$this->breadcrumbs=array(
	'Icousers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ICOUsers', 'url'=>array('index')),
	array('label'=>'Create ICOUsers', 'url'=>array('create')),
	array('label'=>'Update ICOUsers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ICOUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ICOUsers', 'url'=>array('admin')),
);
?>

<h1>View ICOUsers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'password',
		'status',
		'access_level',
		'created_at',
		'updated_at',
	),
)); ?>
