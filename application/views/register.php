<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    .register-page{
      background-image: url("<?= base_url('assets/image/g_wallpaper.png')?>");
    }
    .register-box{
      width: auto;
    }
  </style> 
</head>
<body class="hold-transition register-page">
  <!-- alerts -->
  <?php include 'alerts.php';?>
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>Welcome</b></a>
      <p>Register a new membership</p>
    </div>
    <div class="card-body">
      <!-- <form action="<?php base_url('Register/save')?>" method="POST"> -->
        <?php echo form_open_multipart('Register/save');?>
        <!-- Profile pic -->
        <div class="float-right" data-tippy-placement="right" title="Tap to Upload Picture" style="width: 200px;">          
          <img class="profile-pic" id="profile-pic" src="<?= base_url('assets/dist/img/avatar.png') ?>" alt="" style="height: 128px;width: 129px;"/>
            <input class="form-control" type="file" name="pic" placeholder="Picture" title="Picture" onchange="image_preview(event)" accept="image/*">
        </div>

        <div class="row">
          <label>FullName</label>
          <div class="col-md-12 row">
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name='firstname' placeholder="First Name" required>
              <!-- <span class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : ''  ?></span> -->
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name='middlename' placeholder="Middle Name">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-6">
              <label>DoB</label>
              <input type="date" class="form-control" name="birthdate" placeholder="select Date of Birth" required >
            </div>
            <div class="form-group col-md-6">
              <label>Gender</label>
              <select class="form-control" name="gender" required>
                <option selected='' value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="email@email.com" required>
            </div>
            <div class="form-group col-md-4">
              <label>Phone No</label>
              <input type="text" class="form-control" name="phone" maxlength="10" placeholder="0240000000" required>
            </div>
            <div class="form-group col-md-4">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="AA-343-3433" >
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-6">
              <label>Profession</label>
              <input type="text" class="form-control" name="profession" placeholder="Profession" >
            </div>
            <div class="form-group col-md-6">
              <label>Church</label>
              <input type="text" class="form-control" name="church" placeholder="Church" >
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-6">
              <label>Member No</label>
              <input type="text" class="form-control" name="memberNo" placeholder="Member No" >
            </div>
            <div class="form-group col-md-6">
              <label>Member Type</label>
              <select class="form-control" name="memberType" required>
                <option selected='' disabled>Member Type</option>
                <option value="Life Time">Life Time</option>
                <option value="Monthly">Monthly</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close();?>

      <a href="<?= base_url('Home')?>" class="text-center">Already a Member</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


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

      //pic
      function image_preview(e){
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('profile-pic');
        output.src = reader.result;
        }
        reader.readAsDataURL(e.target.files[0]);
      }
    </script>
</body>
</html>
