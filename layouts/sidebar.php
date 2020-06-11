<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

          <img src="../favicon.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print($_SESSION['full_name']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php if($_SESSION['role'] == 'admin'){ ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU ADMIN</li>
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>MASTER DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tarif.php"><i class="fa fa-group"></i> Data Tarif</a></li>
            <li><a href="kriteria.php"><i class="fa fa-tags"></i> Data Kriteria</a></li>
            <li><a href="pembobotan.php"><i class="fa fa-sitemap"></i> Data Pembobotan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span>DATA KLASIFIKASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="himpunan.php"><i class="fa fa-group"></i> Data Himpunan Kriteria</a></li>
            <li><a href="klasifikasi.php"><i class="fa fa-tags"></i> Proses Klasifikasi</a></li>
            <li><a href="analisa.php"><i class="fa fa-sitemap"></i> Analisa</a></li>
          </ul>
        </li>
        <li><a href="users.php"><i class="fa fa-user"></i> <span>Users</span></a></li>
      </ul>
      <?php
    }else{
      ?>
     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PIMPINAN</li>
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>MASTER DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tarif.php"><i class="fa fa-group"></i> Data Tarif</a></li>
            <li><a href="kriteria.php"><i class="fa fa-tags"></i> Data Kriteria</a></li>
            <li><a href="pembobotan.php"><i class="fa fa-sitemap"></i> Data Pembobotan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span>DATA KLASIFIKASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="himpunan.php"><i class="fa fa-group"></i> Data Himpunan Kriteria</a></li>
            <li><a href="klasifikasi.php"><i class="fa fa-tags"></i> Proses Klasifikasi</a></li>
            <li><a href="analisa.php"><i class="fa fa-sitemap"></i> Analisa</a></li>
          </ul>
        </li>
        <li><a href="users.php"><i class="fa fa-user"></i> <span>Users</span></a></li>
      </ul>
      <?php
    } ?>
    </section>
    <!-- /.sidebar -->
  </aside>