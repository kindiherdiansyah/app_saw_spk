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
        Data Tarif
        <small>PT. Pos Logistik Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Tarif</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tarif</h3>
              <a href="tarif_tambah.php" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px">#</th>
                  <th>ID Tarif</th>
                  <th>Tarif Alternatif</th>
                <!--   <th>Jenis kelamin</th>
                  <th>Lulusan</th>
                  <th>Status</th> -->
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                $kriteria=mysqli_query($konek, "SELECT * FROM tbl_tarif");
                while ($data = mysqli_fetch_array($kriteria)) { ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$data['id_tarif']?></td>
                  <td><?=$data['tarif']?></td>
                  <!-- <td><?=($data['jk']=='L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                  <td><?=$data['pendidikan_terakhir']?></td>
                  <td><?=$data['status_kawin']?></td> -->
                  <td>
                    <a href="tarif_edit.php?id=<?php echo $data['id']; ?>"><i class='fa fa-edit'></i>
                    </a>
                    <a href="proses.php?aksi=hapus&data=tbl_tarif&id=<?php echo $data['id']; ?>"><i class='fa fa-eraser'></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>
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