	<!-- All content on dashboard goes here -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url($pageTitle) ?>" class="brand-link">
      <img src="<?= base_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Name of Association</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= ($this->session->userdata['pic'] !== '') ? base_url('assets/image/profilePics/'.$this->session->userdata['email'].$this->session->userdata['pic']) : base_url('assets/dist/img/avatar2.png') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?=  $this->session->userdata['fullname'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul role="list" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- dashboard -->
          <!-- <li class="nav-header">DASHBOARD</li> -->
          <li class="nav-item">
            <a href="<?= base_url('Dashboard')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Dashboard')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- members -->
          <li class="nav-header">MEMBERS</li>
          <li class="nav-item">
            <a href="<?= base_url('Members')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Members')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Add/Edit Members </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Members/unapproved')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Members/unapproved')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Unapproved Members</p>
            </a>
          </li>


          <!-- members -->
          <li class="nav-header">GROUPS</li>
          <li class="nav-item">
            <a href="<?= base_url('Groups')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Groups')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Add/Edit Groups </p>
            </a>
          </li><!-- 
          <li class="nav-item">
            <a href="<?= base_url('Members/grouptype')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Members/grouptype')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Add/Edit Groups Type</p>
            </a>
          </li> -->


          <!-- attendance -->
          <li class="nav-header">ATTENDANCE</li>
          <li class="nav-item">
            <a href="<?= base_url('Attendance')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Attendance')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-check"></i>
              <p>Attendence</p>
            </a>
          </li>

          <!-- dues -->
          <li class="nav-header">DUES & DONATIONS</li>
          <li class="nav-item">
            <a href="<?= base_url('Dues')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Dues')) ? 'active' : ''; ?>">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>Dues</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Donations')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Donations')) ? 'active' : ''; ?>">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>Donations</p>
            </a>
          </li>

          <!-- users -->
          <li class="nav-header">USERS</li>
          <li class="nav-item">
            <a href="<?= base_url('Users')?>" class="nav-link <?= (site_url($pageTitle) == base_url('Users')) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Add/Edit User </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>All Users</p>
            </a>
          </li> -->
          
          <li class="nav-header">SIGN OUT</li>
          <li class="nav-item">
            <a href="<?= base_url('Home/logout')?>" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  