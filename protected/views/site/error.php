<style>
.error {
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #394263;
    font-size: 13px;
    background-color: #222222;
}
</style>
<div id="error-container" class="error">
	<div class="error-options">
		<h3><i class="fa fa-chevron-circle-left text-muted"></i> <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">Go Back</a></h3>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 text-center">
		    <div class="widget widget-two">
			    <h1><i class="fa fa-cog fa-spin text-danger"></i> <?php echo $code; ?></h1>
			    <h2 class="h3"><?php echo CHtml::encode($message); ?></h2>
			</div>
		</div>
	</div>
</div>