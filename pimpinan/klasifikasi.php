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
        Data Klasifikasi
        <small>PT. Pos Logistik Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Klasifikasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Klasifikasi</h3>
              <a href="klasifikasi_tambah.php" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Tambah Klasifikasi</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr align="center">
                  <th width="10px">#</th>
                  <th>Alternatif Tarif/Atribut</th>
                  <?php
                  $no=0;
                  $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                  <th><?=$data['nama_kriteria']?></th>
                  <?php }?>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no=0;
                  $kriteria=mysqli_query($konek, "SELECT tbl_tarif.tarif, tbl_klasifikasi.* FROM tbl_tarif,tbl_klasifikasi WHERE tbl_tarif.id=tbl_klasifikasi.id_tarif");
                  if (!$kriteria) {
                      printf("Error: %s\n", mysqli_error($konek));
                  exit();
                  }
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                    <tr align="center">
                      <td><?php echo $no=$no+1; ?></td>
                      <td><?php print($data['tarif']); ?></td>
                      <td><?=$data['c1']?></td>
                      <td><?=$data['c2']?></td>
                      <td><?=$data['c3']?></td>
                      <td><?=$data['c4']?></td>
                      <td>
                      <a href="klasifikasi_edit.php?id=<?php echo $data['id']; ?>"><i class='fa fa-edit'></i>
                      </a>
                      <a href="proses.php?aksi=hapus&data=tbl_klasifikasi&id=<?php echo $data['id']; ?>"><i class='fa fa-eraser'></i>
                      </a>
                      </td>
                    </tr>
                  <?php }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    
    <!-- /.content -->
  </div>

		<?php include_once '../layouts/copyright.php'; ?>
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- Page script js-->
	<?php include_once '../layouts/footer.php'; ?>
	<script>
	 $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
	</script>
</body>
</html>