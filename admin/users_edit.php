<?php 
include_once '../layouts/head.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_users WHERE id=".$id;
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
        Users
        <small>Edit Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="users.php">Users</a></li>
        <li class="active">Edit Users</li>
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
              <h3 class="box-title">Edit Users</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="full_name">Full Name</label>
                  <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Full Name" value="<?=$row['full_name']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?=$row['username']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" placeholder="Enter Password" value="<?=$row['password']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?=$row['email']?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="role">Role</label>
                  <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role" value="<?=$row['role']?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
                <button class='btn btn-danger' onclick="self.history.back()" type='button'><i class="fa fa-arrow-left"></i> Batal</button>
              </div>
            </form>
            <?php
              if(isset($_POST['update'])){
                $id = $_GET['id'];
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $query = "UPDATE tbl_users SET full_name='$full_name', username='$username', password='$password', email='$email', role='$role' WHERE id='$id'";
                $result = mysqli_query($konek, $query);
                if ($result) {
                  echo "<script>window.alert('Data Users berhasil diubah');
                        window.location=(href='users.php')</script>";
                }else{
                  echo "Error updating record: " . mysqli_error($konek);
                }
              }
               mysqli_close($konek);
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
	<!-- code JS -->
</body>
</html>