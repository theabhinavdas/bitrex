<?php
/* @var $this ICOSocialController */
/* @var $model ICOSocial */

$this->breadcrumbs=array(
	'Icosocials'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ICOSocial', 'url'=>array('index')),
	array('label'=>'Create ICOSocial', 'url'=>array('create')),
	array('label'=>'View ICOSocial', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ICOSocial', 'url'=>array('admin')),
);
?>

<h1>Update ICOSocial <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>