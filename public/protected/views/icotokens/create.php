<?php
/* @var $this ICOTokensController */
/* @var $model ICOTokens */

$this->breadcrumbs=array(
	'Icotokens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ICOTokens', 'url'=>array('index')),
	array('label'=>'Manage ICOTokens', 'url'=>array('admin')),
);
?>

<h1>Create ICOTokens</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>