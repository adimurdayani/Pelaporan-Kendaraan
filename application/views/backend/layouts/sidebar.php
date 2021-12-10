<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu bg-warning">

  <div class="h-100" data-simplebar>

    <!-- User box -->
    <div class="user-box text-center">
      <img src="<?= base_url()?>assets/images/users/user-tie-solid.svg" alt="user-img" title="Mat Helme"
        class="rounded-circle avatar-md">
      <div class="dropdown">
        <a href="javascript: void(0);" class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"
          data-toggle="dropdown"><?= $users_ses['nama']?></a>
        <div class="dropdown-menu user-pro-dropdown">

          <!-- item-->
          <a href="<?= base_url('backend/profile')?>" class="dropdown-item notify-item">
            <i class="fe-user mr-1"></i>
            <span>Profile</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item" data-toggle="modal"
            data-target="#modal-logout">
            <i class="fe-log-out mr-1"></i>
            <span>Logout</span>
          </a>

        </div>
      </div>
      <p class="text-muted"><?= $users_ses['username']?></p>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

      <ul id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
          <a href="<?= base_url('backend/dashboard')?>">
            <i data-feather="airplay"></i>
            <span <?php if($judul == 'Dashboard'):?> class="text-white" <?php endif;?>> Dashboards </span>
          </a>
        </li>

        <li class="menu-title mt-2">Aplikasi</li>

        <li>
          <a href="<?= base_url('backend/pelaporan')?>">
            <i data-feather="file-text"></i>
            <span <?php if($judul == 'Tabel Pelaporan'):?> class="text-white" <?php endif;?>> Laporan </span>
          </a>
        </li>

        <li>
          <a href="#data-referensi" data-toggle="collapse">
            <i data-feather="database"></i>
            <span <?php if($judul == 'Tabel Kecamatan'):?> class="text-white"
              <?php elseif($judul == 'Tabel Kelurahan'):?> class="text-white" <?php endif;?>> Data Referensi </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="data-referensi">
            <ul class="nav-second-level">
              <li>
                <a href="<?= base_url('backend/kecamatan')?>" <?php if($judul == 'Tabel Kecamatan'):?>
                  class="text-white" <?php endif;?>>Kecamatan</a>
              </li>
              <li>
                <a href="<?= base_url('backend/kelurahan')?>" <?php if($judul == 'Tabel Kelurahan'):?>
                  class="text-white" <?php endif;?>>Kelurahan</a>
              </li>
            </ul>
          </div>
        </li>

        <li class="menu-title mt-2">Pengaturan</li>

        <li>
          <a href="#user-setting" data-toggle="collapse">
            <i data-feather="settings"></i>
            <span <?php if($judul == 'Tabel Users'):?> class="text-white" <?php elseif($judul == 'Tabel Role'):?>
              class="text-white" <?php endif;?>> User Manajemen </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="user-setting">
            <ul class="nav-second-level">
              <li>
                <a href="<?= base_url('backend/users')?>" <?php if($judul == 'Tabel Users'):?> class="text-white"
                  <?php endif;?>>Users</a>
              </li>
              <li>
                <a href="<?= base_url('backend/role')?>" <?php if($judul == 'Tabel Role'):?> class="text-white"
                  <?php endif;?>>Role</a>
              </li>
            </ul>
          </div>
        </li>

      </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->


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
        <a href="<?= base_url('login/logout')?>" class="btn btn-primary">Logout</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->