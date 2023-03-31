<!-- Navbar --> 
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" title="Hide/Unhide Menu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><?php echo $Nowdate; ?></a>
       
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown" >
        <a class="nav-link" data-toggle="dropdown">
          <i class="fas fa-birthday-cake"></i>
          <span class="badge badge-danger navbar-badge"><?=count($dob)?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a  class="dropdown-item">
             <!-- Message Start -->
             <?php if(count($dob)):?>
                  <?php foreach ($dob as $dob):?>
              <div class="media">
                <img src="<?=($dob->photo !== '') ? base_url('assets/image/profilePics/'.$dob->Email.$dob->photo) : base_url('assets/dist/img/avatar2.png')?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?=$dob->FName.$dob->MName.$dob->LName?>
                    <span class="float-right text-sm text-danger"><i class="fas fa-birthday-cake"></i></span>
                  </h3>
                  <p class="text-sm">Birthday Month</p>
                  <p class="text-sm text-muted"> <i class="far fa-clock mr-1"></i><?= $dob->DoB?> 
                    <?php if(date('m-d',strtotime($dob->DoB)) < date('m-d')):?>
                    <small style="color: red;">Belated</small> 
                    <?php endif;?>
                  </p>
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <?php endforeach;?>
                  <?php endif;?>
              <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        </div>  

      </li>

      <!-- profile -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown"  role="button">
          <img src="<?= ($this->session->userdata['pic'] !== '') ? base_url('assets/image/profilePics/'.$this->session->userdata['email'].$this->session->userdata['pic']) : base_url('assets/dist/img/avatar2.png') ?>" class="img-circle elevation-2" alt="User Image" style="width: 30px;">

          <?=  $this->session->userdata['fullname'];?>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <span class="dropdown-item dropdown-header"></span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('Home/logout')?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt nav-icon"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar