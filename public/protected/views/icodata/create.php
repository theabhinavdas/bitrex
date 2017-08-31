<?php
/* @var $this ICODataController */
/* @var $model ICOData */

$this->breadcrumbs=array(
	'Icodatas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ICOData', 'url'=>array('index')),
	array('label'=>'Manage ICOData', 'url'=>array('admin')),
);
?>

<h1>Create ICOData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>