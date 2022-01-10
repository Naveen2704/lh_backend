<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle"></i> <?=$this->session->userdata('user_name')?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?=ucwords($this->session->userdata('profile_name'))?></span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
            <a href="<?=base_url('Auth/Logout')?>" class="dropdown-item">
                <i class="fa fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
      </li>
    </ul>
  </nav>