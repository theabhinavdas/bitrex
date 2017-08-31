<?php
/* @var $this ICODataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Icodatas',
);

$this->menu=array(
	array('label'=>'Create ICOData', 'url'=>array('create')),
	array('label'=>'Manage ICOData', 'url'=>array('admin')),
);
?>

<h1>Icodatas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
