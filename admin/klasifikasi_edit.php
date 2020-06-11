<?php 
include_once '../layouts/head.php'; 
  $id = $_GET['id'];if (isset($_GET['id'])) {

  $query = "SELECT tbl_klasifikasi.id_tarif,tbl_klasifikasi.c1,tbl_klasifikasi.c2,tbl_klasifikasi.c3,tbl_klasifikasi.c4
FROM tbl_klasifikasi INNER JOIN tbl_tarif ON tbl_klasifikasi.id_tarif=tbl_tarif.id WHERE tbl_klasifikasi.id=".$id;
  $result = mysqli_query($konek, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
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
        Edit Klasifikasi
        <small>PT. Pos Logistik Indonesia</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="klasifikasi.php"> Klasifikasi</a></li>
        <li class="active">Edit Klasifikasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit data Klasifikasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form action="proses.php?aksi=update&data=klasifikasi" method="POST">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                  <label>Tarif</label>
                  <select name="id_tarif" class="form-control select2" style="width: 100%;">
                  <?php 
                  $query = "SELECT * FROM tbl_tarif order by id asc";
                  $result = mysqli_query($konek,$query);
                  while ($data = mysqli_fetch_array($result))
                    {?>
                  <option value="<?=$data['id']?>" <?=($data['id']==$row['id_tarif']) ? 'selected' : '';?>><?=$data['tarif']?></option>
                   <?php }
                  ?>
                  <option></option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label>C1</label>
                  <input type="text" class="form-control" name="c1" value="<?=$row['c1']?>">
                </div>
                <div class="form-group col-md-12">
                  <label>C2</label>
                  <input type="text" class="form-control" name="c2" value="<?=$row['c2']?>">
                </div>
                <div class="form-group col-md-12">
                  <label>C3</label>
                  <input type="text" class="form-control" name="c3" value="<?=$row['c3']?>">
                </div>
                <div class="form-group col-md-12">
                  <label>C4</label>
                  <input type="text" class="form-control" name="c4" value="<?=$row['c4']?>">
                </div>               
              </div>
              <!-- /.col -->
            </div>

            <a class="btn btn-danger" href="klasifikasi.php"><span class="fa fa-arrow-left"></span> Back</a>
            <button class="btn btn-primary pull-right" type="submit"> <span class="fa fa-save"></span> Submit</button>
            <!-- /.row -->
          </div>          
        </form>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div> -->
      </div>
      <!-- /.box -->

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
	   //Initialize Select2 Elements
	   $(".select2").select2();

	   //Datemask dd/mm/yyyy
	   $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	   //Datemask2 mm/dd/yyyy
	   $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
	   //Money Euro
	   $("[data-mask]").inputmask();

	   //Date range picker
	   $('#reservation').daterangepicker();
	   //Date range picker with time picker
	   $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
	   //Date range as a button
	   $('#daterange-btn').daterangepicker(
	       {
	         ranges: {
	           'Today': [moment(), moment()],
	           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	           'This Month': [moment().startOf('month'), moment().endOf('month')],
	           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	         },
	         startDate: moment().subtract(29, 'days'),
	         endDate: moment()
	       },
	       function (start, end) {
	         $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	       }
	   );

	   //Date picker
	   $('#datepicker').datepicker({
	     autoclose: true
	   });

	   //iCheck for checkbox and radio inputs
	   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	     checkboxClass: 'icheckbox_minimal-blue',
	     radioClass: 'iradio_minimal-blue'
	   });
	   //Red color scheme for iCheck
	   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
	     checkboxClass: 'icheckbox_minimal-red',
	     radioClass: 'iradio_minimal-red'
	   });
	   //Flat red color scheme for iCheck
	   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	     checkboxClass: 'icheckbox_flat-green',
	     radioClass: 'iradio_flat-green'
	   });

	   //Colorpicker
	   $(".my-colorpicker1").colorpicker();
	   //color picker with addon
	   $(".my-colorpicker2").colorpicker();

	   //Timepicker
	   $(".timepicker").timepicker({
	     showInputs: false
	   });
	 });
	</script>
</body>
</html>