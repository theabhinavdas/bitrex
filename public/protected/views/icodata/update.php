<?php
/* @var $this ICODataController */
/* @var $model ICOData */

$this->breadcrumbs=array(
	'Icodatas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ICOData', 'url'=>array('index')),
	array('label'=>'Create ICOData', 'url'=>array('create')),
	array('label'=>'View ICOData', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ICOData', 'url'=>array('admin')),
);
?>

<h1>Update ICOData <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>