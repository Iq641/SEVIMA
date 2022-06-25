<?php
/* @var $this MstMapelController */
/* @var $model MstMapel */

$this->breadcrumbs=array(
	'Mst Mapels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MstMapel', 'url'=>array('index')),
	array('label'=>'Create MstMapel', 'url'=>array('create')),
	array('label'=>'View MstMapel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MstMapel', 'url'=>array('admin')),
);
?>

<h1>Update MstMapel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>