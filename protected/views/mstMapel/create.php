<?php
/* @var $this MstMapelController */
/* @var $model MstMapel */

$this->breadcrumbs=array(
	'Mst Mapels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MstMapel', 'url'=>array('index')),
	array('label'=>'Manage MstMapel', 'url'=>array('admin')),
);
?>

<h1>Create MstMapel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>