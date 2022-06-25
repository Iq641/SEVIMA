<?php
class Sidebar{
	public function navigasi(){ ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="site/index.php" class="brand-link">
      <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>A p <font style="color: yellow">e</font> L</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-lock"></i>
              <p>
                Administrator
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-arrow-down nav-icon"></i>
                  <p>
                    Master
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo Yii::app()->controller->createUrl('mstkategori/index'); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Kategori</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo Yii::app()->controller->createUrl('mstsoal/index'); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Soal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo Yii::app()->controller->createUrl('mstuser/index'); ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data User</p>
                    </a>
                  </li>
               </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
            </ul>
          </li>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php
	}
}
?>