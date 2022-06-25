<?php
/* @var $this MstMapelController */
/* @var $dataProvider CActiveDataProvider */


$this->menu=array(
	array('label'=>'Create MstMapel', 'url'=>array('create')),
	array('label'=>'Manage MstMapel', 'url'=>array('admin')),
);
?>

<h1>Mst Mapels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  11
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
		  </div>
	    </div>
	</div>
</section
