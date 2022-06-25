<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Application of eLearning</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php
	$topbar=new Topbar();
	echo $topbar->navigasi();
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  $sidebar=new Sidebar();
  echo $sidebar->navigasi();
  ?>

    <!-- Main content -->
    <?php
		echo $content;
	?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php
  $footer=new Footer();
  echo $footer->navigasi();
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
</body>
</html>
