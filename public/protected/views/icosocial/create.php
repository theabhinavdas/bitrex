<?php
/* @var $this ICOSocialController */
/* @var $model ICOSocial */

$this->breadcrumbs=array(
	'Icosocials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ICOSocial', 'url'=>array('index')),
	array('label'=>'Manage ICOSocial', 'url'=>array('admin')),
);
?>

<h1>Create ICOSocial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>