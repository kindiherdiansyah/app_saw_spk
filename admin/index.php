<?php 
include_once '../layouts/head.php'; 
?>
<link rel="icon" href="../poslog.jpg">
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php 
    include_once '../layouts/header.php';
    include_once '../layouts/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>PT. Pos Logistik Indonesia</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">

            <!-- quick email widget -->
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-envelope"></i>

                <h3 class="box-title">Selamat Datang <br/><?php echo ucwords($_SESSION['role']) ?></h3>
                <br>
                <br>
                <br>

        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <?php 
            $get_db = mysqli_connect('localhost','root','','tgs_saw'); 
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($get_db, "SELECT COUNT(id) as jumlah FROM tbl_kriteria");

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Kriteria</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="../admin/kriteria.php" class="small-box-footer" title="Tambah" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div>

       <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php 
            $get_db = mysqli_connect('localhost','root','','tgs_saw'); 
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($get_db, "SELECT COUNT(id) as jumlah FROM tbl_pembobotan");

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Pembobotan</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="../admin/pembobotan.php" class="small-box-footer" title="Tambah" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php 
            $get_db = mysqli_connect('localhost','root','','tgs_saw'); 
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($get_db, "SELECT COUNT(id) as jumlah FROM tbl_users");

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data User</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="../admin/users.php" class="small-box-footer" title="Tambah" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->
      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php 
            $get_db = mysqli_connect('localhost','root','','tgs_saw'); 
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($get_db, "SELECT COUNT(id) as jumlah FROM tbl_himpunan");

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Himpunan</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div>
          <a href="../admin/himpunan.php" class="small-box-footer" title="Tambah" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->
                <!-- tools box -->
               <!--  <div class="pull-right box-tools">
                  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                          title="Remove">
                    <i class="fa fa-times"></i></button>
                </div> -->
                <!-- /. tools -->

                <!--  <center><img width="100px" src="sawspk\favicon.png" /></center> -->
              </div>
              <div class="box-body">

 <center><h2><strong>SISTEM PENDUKUNG KEPUTUSAN PENETAPAN TARIF KARGO MENGGUNAKAN METODE SIMPLE ADDITIVE WEIGHTING</strong></h2><img src="../bg5.jpg"></center>
              </div>
             <!--  <div class="box-footer clearfix">
                <button type="button" class="pull-right btn btn-default" id="sendEmail">OK
                  <i class="fa fa-arrow-circle-right"></i></button>
              </div> -->
            </div>
          </section>
          <!-- /.Left col -->
          
        </div>
        <!-- /.row (main row) -->
      </section>
      
      <!-- /.content -->
    </div>
    
    <?php include_once '../layouts/copyright.php'; ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- page script js -->
  <?php include_once '../layouts/footer.php'; ?>
  <!-- scrip js -->
</body>
</html>