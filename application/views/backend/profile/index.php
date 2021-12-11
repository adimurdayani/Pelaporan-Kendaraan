<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $judul ?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul ?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-4 col-xl-4">
          <div class="card-box text-center">
            <img src="<?= base_url() ?>assets/images/users/user-tie-solid.svg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

            <h4 class="mb-0"><?= $users_ses['nama'] ?></h4>
            <p class="text-muted"><?= $users_ses['email'] ?></p>

          </div> <!-- end card-box -->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
          <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
              <li class="nav-item">
                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                  Settings
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane show active" id="settings">
                <form method="post" action="<?= base_url(
                    'backend/profile/edit'
                ) ?>">
                  <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                  <div class="row">
                    <input type="hidden" name="id" value="<?= $users_ses[
                        'id'
                    ] ?>">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter nama" value="<?= set_value(
                            'nama'
                        ) ?>">
                        <?= form_error(
                            'nama',
                            '<small class="text-danger">',
                            '</small>'
                        ) ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" value="<?= set_value(
                            'username'
                        ) ?>">
                        <?= form_error(
                            'username',
                            '<small class="text-danger">',
                            '</small>'
                        ) ?>
                      </div>
                    </div> <!-- end col -->
                  </div> <!-- end row -->

                  <div class="form-group">
                    <label for="useremail">Email Address</label>
                    <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email" value="<?= set_value(
                        'email'
                    ) ?>">
                    <?= form_error(
                        'email',
                        '<small class="text-danger">',
                        '</small>'
                    ) ?>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="<?= set_value(
                        'phone'
                    ) ?>">
                    <?= form_error(
                        'phone',
                        '<small class="text-danger">',
                        '</small>'
                    ) ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                        <?= form_error(
                            'password',
                            '<small class="text-danger">',
                            '</small>'
                        ) ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="conf_pass">Konfirmasi Password</label>
                        <input type="password" name="conf_pass" class="form-control" id="conf_pass" placeholder="Enter konfirmasi password">
                        <?= form_error(
                            'conf_pass',
                            '<small class="text-danger">',
                            '</small>'
                        ) ?>
                      </div>
                    </div> <!-- end col -->
                  </div> <!-- end row -->

                  <div class="text-right">
                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                  </div>
                </form>
              </div>
              <!-- end settings content-->

            </div> <!-- end tab-content -->
          </div> <!-- end card-box-->

        </div> <!-- end col -->
      </div>
      <!-- end row-->

    </div> <!-- container -->

  </div> <!-- content -->

