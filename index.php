<?php
 include 'head.php'; 
 ?>
<link rel="icon" href="poslog.jpg">
<body class="hold-transition">
<div class="login-box">
 
    <style type="text/css">
body { 
  background-image: url('bg6.jpg');
  background-repeat: no-repeat;
  position: fixed;
  width: 100%;
  height: 100%;
  background-size: cover; 
}
</style>

  <div class="login-logo">

    <a href="index.php"><strong><h3></h3></strong></a>
   
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

     <center><img width="100px" src="favicon.png" /></center>
     <br>
   <!--  <p class="login-box-msg">Sign in to start your session</p> -->

    <form action="check_in.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <?php 
    if (isset($_GET['error'])==4) { ?>
      <div>
        <strong><font color="red"> Username atau Password Salah, Silahkan Coba Lagi.</font></strong>
      </div>
    <?php }
    ?>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <a href="register.php" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<script src="ui/plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="ui/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
