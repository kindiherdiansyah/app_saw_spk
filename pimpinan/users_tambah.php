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
        Users
        <small>Tambah User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="users.php">Users</a></li>
        <li class="active">Tambah User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="full_name">Full Name</label>
                  <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Full Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                </div>
                <div class="form-group col-md-6">
                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="role">Role</label>
                  <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
                <button class='btn btn-danger' onclick="self.history.back()" type='button'><i class="fa fa-arrow-left"></i> Batal</button>
              </div>
            </form>
            <?php
              if(isset($_POST['simpan'])){

                  $cek_data = mysqli_num_rows(mysqli_query($konek,"SELECT full_name FROM tbl_users WHERE full_name='$_POST[full_name]'"));
                  if ($cek_data > 0){
                      echo "<script>window.alert('Data user sudah ada! Mohon ulangi.');
                              window.location=(href='users_tambah.php')</script>";
                } else {
                      $sql = "INSERT INTO tbl_users VALUES('','$_POST[full_name]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[role]')";
                      $query = mysqli_query($konek,$sql);
                      if($query) {
                      echo "<script>window.alert('Data user berhasil ditambah');
                              window.location=(href='users.php')</script>";
                      }
                  }
              }
              ?>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->

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