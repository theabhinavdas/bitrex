<?php
/* @var $this ICOUsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Icousers',
);

$this->menu=array(
	array('label'=>'Create ICOUsers', 'url'=>array('create')),
	array('label'=>'Manage ICOUsers', 'url'=>array('admin')),
);
?>

<h1>Icousers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
