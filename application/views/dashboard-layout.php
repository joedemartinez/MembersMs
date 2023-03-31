<?php include 'dashboard-header.php';?>
  
<?php include 'navbar.php';?>
  
<!-- Main Sidebar Container -->
  <?php include 'sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= isset($pageTitle) ? $pageTitle : 'Page'?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url()?>"><?= isset($pageTitle) ? $pageTitle : 'Page'?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <!-- alerts -->
      <?php include 'alerts.php';?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php if(isset($pageTitle) && $pageTitle=='Dashboard'): ?>
      <?php include 'dashboard.php';?>
     <?php endif; ?>
     <?php if(isset($pageTitle) && ($pageTitle=='Members' || $pageTitle=='Unapproved Members')): ?>
      <?php include 'members.php';?>
     <?php endif; ?>
     <?php if(isset($pageTitle) && $pageTitle=='Groups'): ?>
      <?php include 'groups.php';?>
     <?php endif; ?>
     <?php if(isset($pageTitle) && $pageTitle=='Users'): ?>
      <?php include 'users.php';?>
     <?php endif; ?>
     <?php if(isset($pageTitle) && $pageTitle=='Dues'): ?>
      <?php include 'dues.php';?>
     <?php endif; ?>
     <?php if(isset($pageTitle) && $pageTitle=='Donations'): ?>
      <?php include 'donations.php';?>
     <?php endif; ?>
     <?php if(isset($pageTitle) && $pageTitle=='Attendance'): ?>
      <?php include 'attendance.php';?>
     <?php endif; ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- overlayModal -->
<?php include 'overlayModal.php';?>

<?php include 'dashboard-footer.php'?>