<?php
/* @var $this ICOUsersController */
/* @var $model ICOUsers */

$this->breadcrumbs=array(
	'Icousers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ICOUsers', 'url'=>array('index')),
	array('label'=>'Manage ICOUsers', 'url'=>array('admin')),
);
?>

<h1>Create ICOUsers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>