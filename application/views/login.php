
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Joshua Appiah Dadzie project">
  <meta name="keywords" content="Joshua Appiah Dadzie, project, membership">
  <meta name="author" content="Joshua Appiah Dadzie">
  <title><?= (isset($pageTitle)) ? $pageTitle : 'Page' ?></title>
  <base href="/">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">
    <style type="text/css">
    .login-page{
      background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.61), rgba(0, 0, 0, 0.48)),url("<?= base_url('assets/image/bg.jpg')?>");
    }
  </style> 
</head>
<body class="hold-transition login-page">
  <!-- alerts -->
  <?php include 'alerts.php';?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Welcome</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php echo form_open('Home/login');?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close();?>
      <a href="<?= base_url('Register')?>" class="text-center">Register a New Member</a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

  <!-- overlayModal -->
<?php include 'overlayModal.php';?>

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- message fade out time -->
    <script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(10000);
      });

      //loadig
      const btn = document.querySelector("button");
      btn.addEventListener("click", changeColor);
          function changeColor() {
            $('#modal-overlay').modal('show');
            setTimeout(function(){
              $('#modal-overlay').modal('hide');
            }, 500);     
      }
    </script>
</body>
</html>
