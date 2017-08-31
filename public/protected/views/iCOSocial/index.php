<?php
/* @var $this ICOSocialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Icosocials',
);

$this->menu=array(
	array('label'=>'Create ICOSocial', 'url'=>array('create')),
	array('label'=>'Manage ICOSocial', 'url'=>array('admin')),
);
?>

<h1>Icosocials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
