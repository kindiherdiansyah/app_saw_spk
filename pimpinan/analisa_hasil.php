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
      <br>
      <a class="btn btn-primary" href="#" onclick="window.print()"><i class="fa fa-print"> Print</i></a>
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
              <h3 class="box-title">Analisa Hasil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr align="center">
                  <th width="10px">#</th>
                  <th><center> Alternatif Tarif/Atribut</center></th>
                  <?php
                  $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                  <th><?=$data['nama_kriteria']?></th>
                  <?php }?>
                </tr>
                </thead>
                <tbody>
                <tr align="center">
                  <td>1</td>
                  <td>Bobot</td>
                  <?php
                  $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                  <td><b><?=$_POST["bobotC$data[id]"]?></b></td>
                  <?php }?>
                </tr>
                <?php 
                  $no=0;
                  $kriteria=mysqli_query($konek, "SELECT tbl_tarif.tarif, tbl_klasifikasi.* FROM tbl_tarif,tbl_klasifikasi WHERE tbl_tarif.id=tbl_klasifikasi.id_tarif");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                    <tr align="center">
                      <td><?php echo $no=$no+1; ?></td>
                      <td><?php print($data['tarif']); ?></td>
                      <td><?=$data['c1']?></td>
                      <td><?=$data['c2']?></td>
                      <td><?=$data['c3']?></td>
                      <td><?=$data['c4']?></td>
                     <!--  <td><?=$data['c5']?></td> -->
                    </tr>
                  <?php }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Normalisasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr align="center">
                  <th width="10px">#</th>
                  <th><center>  Alternatif Tarif/Atribut</center></th>
                  <?php
                  $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                  <th><?=$data['nama_kriteria']?></th>
                  <?php }?>
                </tr>
                </thead>
                <tbody>
                <tr align="center">
                  <td>1</td>
                  <td>Bobot</td>
                  <?php
                  $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                  <td><b><?=$_POST["bobotC$data[id]"]?></b></td>
                  <?php }?>
                </tr>
                <?php 
                #Cari nilai maximal
                $carimax = mysqli_query($konek, "SELECT max(c1) as max1,
                                max(c2) as max2,
                                max(c3) as max3,
                                max(c4) as max4
                                -- max(c5) as max5
                                FROM tbl_klasifikasi");
                $max = mysqli_fetch_array($carimax);
                # Cari nilai minimal
                $carimin = mysqli_query($konek, "SELECT min(c1) as min1,
                                min(c2) as min2,
                                min(c3) as min3,
                                min(c4) as min4
                                -- min(c5) as min5
                                FROM tbl_klasifikasi");
                $min = mysqli_fetch_array($carimin);
                  $no=0;
                  $kriteria=mysqli_query($konek, "SELECT tbl_tarif.tarif, tbl_klasifikasi.* FROM tbl_tarif,tbl_klasifikasi WHERE tbl_tarif.id=tbl_klasifikasi.id_tarif");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                    <tr align="center">
                      <td><?php echo $no=$no+1; ?></td>
                      <td><?php print($data['tarif']); ?></td>
                      <td><?=round($data['c1']/$max['max1'],2)?></td>
                      <td><?=round($data['c2']/$max['max2'],2)?></td>
                      <td><?=round($data['c3']/$max['max3'],2)?></td>
                      <!-- <td><?=round($data['c4']/$max['max4'],2)?></td> -->
                      <td><?=round($min['min4']/$data['c4'],2)?></td>
                     <!--  <td><?=round($min['min5']/$data['c5'],2)?></td> -->
                    </tr>
                  <?php }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Perangkingan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="bigtable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px">#</th>
                  <th width="500px"><center>Alternatif/Atribut</center></th>
                  <th><center>Nilai</center></th>
                </tr>
                </thead>
                <tbody>
                <tr align="center">
                <?php 
                $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) {
                   $bobotC[] = $_POST["bobotC$data[id]"];                   
                   }
                  $no=0;
                  $kriteria=mysqli_query($konek, "SELECT tbl_tarif.tarif, tbl_klasifikasi.* FROM tbl_tarif,tbl_klasifikasi WHERE tbl_tarif.id=tbl_klasifikasi.id_tarif");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                    <tr align="center">
                      <td><?php echo $no=$no+1; ?></td>
                      <td><?php print($data['tarif']); ?></td>
                      <td><?= round(
                        (($data['c1']/$max['max1'])*$bobotC[0])+
                        (($data['c2']/$max['max2'])*$bobotC[1])+
                        (($data['c3']/$max['max3'])*$bobotC[2])+
                        (($min['min4']/$data['c4'])*$bobotC[3]),3)?></td>
                    </tr>
                  <?php }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

           <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Kesimpulan</h3>
              <br>
              <br>
              
              <?php 
                $kriteria=mysqli_query($konek, "SELECT * FROM tbl_kriteria");
                  while ($data = mysqli_fetch_array($kriteria)) {
                   $bobotC[] = $_POST["bobotC$data[id]"];                   
                   }
                  $no=0;
                  $kriteria=mysqli_query($konek, "SELECT tbl_tarif.tarif, tbl_klasifikasi.* FROM tbl_tarif,tbl_klasifikasi WHERE tbl_tarif.id=tbl_klasifikasi.id_tarif limit 1");
                  while ($data = mysqli_fetch_array($kriteria)) { ?>
                    
                    <tr align="center">
                     <!--  <td><?php echo $no=$no+1; ?></td> -->
                      <h4>Dari hasil perangkingan diatas, maka Tarif alternatif yang ditetapkan sebagai tarif kargo adalah (
                      <strong>
                        <td>Rp. <?php print($data['tarif']); ?></td>
                      </strong>
                         ) dengan nilai tertinggi (<strong>
                      <td>
                        <?= round(
                        (($data['c1']/$max['max1'])*$bobotC[0])+
                        (($data['c2']/$max['max2'])*$bobotC[1])+
                        (($data['c3']/$max['max3'])*$bobotC[2])+
                        (($min['min4']/$data['c4'])*$bobotC[3]),3)?></td></strong> )</h4>
                    </tr>

                  <?php }
                ?>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
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
    $("#example2").DataTable();
    $('#example3').DataTable(
    {
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
     $("#bigtable").dataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "columnDefs": [{
      "defaultContent": "-",
      "targets": "_all"
  }]
});
	</script>
</body>
</html>