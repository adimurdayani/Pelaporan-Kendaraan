<!-- Topbar Start -->
<div class="navbar-custom">
  <div class="container-fluid">
    <ul class="list-unstyled topnav-menu float-right mb-0">

      <li class="dropdown notification-list topbar-dropdown">
        <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <i class="fe-bell noti-icon"></i>
          <span class="badge badge-danger rounded-circle noti-icon-badge" id="total">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

          <!-- item-->
          <div class="dropdown-item noti-title">
            <h5 class="m-0">
              <span class="float-right">
              </span>Notification
            </h5>
          </div>

          <div class="noti-scroll" data-simplebar>

            <!-- item-->
            <a href="<?= base_url(
                        'backend/users'
                      ) ?>" class="dropdown-item notify-item">
              <div class="notify-icon bg-warning">
                <i class="mdi mdi-account-plus"></i>
              </div>
              <p id="nama" class=" mb-0"></p>
              <p id="pesan" class="text-muted notify-details">Tidak ada akun registrasi.
              </p>
              <small class="text-muted float-right" id="tanggal"></small>
            </a>

            <!-- All-->
            <a href="<?= base_url('backend/users') ?>" class="dropdown-item text-center text-primary notify-item notify-all">
              View all
              <i class="fe-arrow-right"></i>
            </a>

          </div>
      </li>

      <li class="dropdown notification-list topbar-dropdown">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          <img src="<?= base_url() ?>assets/images/users/user-tie-solid.svg" alt="user-image" class="rounded-circle">
          <span class="pro-user-name ml-1">
            <?= $users_ses['nama'] ?><i class="mdi mdi-chevron-down"></i>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
          <!-- item-->
          <div class="dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome !</h6>
          </div>

          <!-- item-->
          <a href="<?= base_url('backend/profile/') ?>" class="dropdown-item notify-item">
            <i class="fe-user"></i>
            <span>Profile</span>
          </a>

          <!-- item-->
          <a href="<?= base_url('backend/users/') ?>" class="dropdown-item notify-item">
            <i class="fe-settings"></i>
            <span>Settings</span>
          </a>

          <div class="dropdown-divider"></div>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item" data-toggle="modal" data-target="#modal-logout">
            <i class="fe-log-out"></i>
            <span>Logout</span>
          </a>

        </div>
      </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
      <a href="index.html" class="logo logo-dark text-center">
        <span class="logo-sm">
          <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="22">
          <!-- <span class="logo-lg-text-light">UBold</span> -->
        </span>
        <span class="logo-lg">
          <img src="<?= base_url() ?>assets/images/logo-l.png" alt="" height="20">
          <!-- <span class="logo-lg-text-light">U</span> -->
        </span>
      </a>

      <a href="index.html" class="logo logo-light text-center">
        <span class="logo-sm">
          <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="<?= base_url() ?>assets/images/logo-l.png" alt="" height="20">
        </span>
      </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
      <li>
        <button class="button-menu-mobile waves-effect waves-light">
          <i class="fe-menu"></i>
        </button>
      </li>

      <li>
        <!-- Mobile menu toggle (Horizontal Layout)-->
        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
          <div class="lines">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </a>
        <!-- End mobile menu toggle-->
      </li>

    </ul>
    <div class="clearfix"></div>
  </div>
</div>
<!-- end Topbar -->

<!-- Top modal content -->
<div id="modal-logout" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-top">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="topModalLabel">Keluar Aplikasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <h5>Apakah anda ingin keluar dari aplikasi?</h5>
        <p>Jika anda ingin keluar silahkan klik tombol "Logout", jika tidak klik tombol "Tutup".</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('login/logout') ?>" class="btn btn-primary">Logout</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->