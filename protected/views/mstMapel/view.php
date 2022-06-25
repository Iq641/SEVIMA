<?php
/* @var $this MstMapelController */
/* @var $model MstMapel */

$this->breadcrumbs=array(
	'Mst Mapels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MstMapel', 'url'=>array('index')),
	array('label'=>'Create MstMapel', 'url'=>array('create')),
	array('label'=>'Update MstMapel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MstMapel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MstMapel', 'url'=>array('admin')),
);
?>

<h1>View MstMapel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idmapel',
		'nama',
	),
)); ?>
