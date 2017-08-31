<?php
/* @var $this ICOUsersController */
/* @var $model ICOUsers */

$this->breadcrumbs=array(
	'Icousers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ICOUsers', 'url'=>array('index')),
	array('label'=>'Create ICOUsers', 'url'=>array('create')),
	array('label'=>'View ICOUsers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ICOUsers', 'url'=>array('admin')),
);
?>

<h1>Update ICOUsers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>