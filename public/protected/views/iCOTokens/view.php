<?php
/* @var $this ICOTokensController */
/* @var $model ICOTokens */

$this->breadcrumbs=array(
	'Icotokens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ICOTokens', 'url'=>array('index')),
	array('label'=>'Create ICOTokens', 'url'=>array('create')),
	array('label'=>'Update ICOTokens', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ICOTokens', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ICOTokens', 'url'=>array('admin')),
);
?>

<h1>View ICOTokens #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ico_company_id',
		'value',
		'token_name',
	),
)); ?>
