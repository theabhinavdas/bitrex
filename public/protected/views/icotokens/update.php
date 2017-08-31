<?php
/* @var $this ICOTokensController */
/* @var $model ICOTokens */

$this->breadcrumbs=array(
	'Icotokens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ICOTokens', 'url'=>array('index')),
	array('label'=>'Create ICOTokens', 'url'=>array('create')),
	array('label'=>'View ICOTokens', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ICOTokens', 'url'=>array('admin')),
);
?>

<h1>Update ICOTokens <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>