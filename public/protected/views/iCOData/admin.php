<?php
/* @var $this ICODataController */
/* @var $model ICOData */

$this->breadcrumbs=array(
	'Icodatas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ICOData', 'url'=>array('index')),
	array('label'=>'Create ICOData', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('icodata-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Icodatas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'icodata-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'management_social_score',
		'advisors_social_score',
		'social_chatter_score',
		/*
		'science_advisors_long_hold_scale',
		'pre_ico_price',
		'ico_price',
		'current_market_price',
		'advisor_linkedin',
		'logo_url',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
