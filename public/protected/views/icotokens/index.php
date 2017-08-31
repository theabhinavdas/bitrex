<?php
/* @var $this ICOTokensController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Icotokens',
);

$this->menu=array(
	array('label'=>'Create ICOTokens', 'url'=>array('create')),
	array('label'=>'Manage ICOTokens', 'url'=>array('admin')),
);
?>

<h1>Icotokens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
