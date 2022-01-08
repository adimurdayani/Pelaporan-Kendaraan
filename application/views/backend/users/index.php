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
                <li class="breadcrumb-item"><a href="<?= base_url('backend/dashboard/') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul; ?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <a href="javascript:void(0);" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add"><i class="fe-plus"></i> Tambah</a>
              <?= $this->session->flashdata('message'); ?>
              <?= form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>', '</div>') ?>
              <?= form_error('konf_pass', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>', '</div>') ?>
              <div class="table-responsive">
                <table id="basic-datatable" class="table wy-table-responsive w-100">
                  <thead>
                    <tr>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;"></th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;">No.</th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center; width: 150px;">Foto</th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;">Nama</th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;">Username</th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;">Email</th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;">Tipe User</th>
                      <th colspan="2" class="text-center">Aktifasi</th>
                      <th colspan="2" class="text-center">Waktu/Tanggal</th>
                    </tr>
                    <tr>
                      <th class="text-center">Sudah</th>
                      <th class="text-center">Belum</th>
                      <th class="text-center">Tanggal Buat</th>
                      <th class="text-center">Tanggal Update</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php $no = 1;
                    foreach ($get_users as $data) : ?>
                      <tr>
                        <td>
                          <a href="<?= base_url('backend/users/hapus/') . $data['id'] ?>" class="badge badge-danger hapus"><i class="fe-trash" title="Hapus"></i></a>
                        </td>
                        <td><?= $no++; ?></td>
                        <td>
                          <img src="<?= base_url('assets/images/users/') . $data['image'] ?>" alt="Foto user" class="img-thumbnail" width="50%">
                        </td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= $data['tipe_user']; ?></td>
                        <td class="text-center">
                          <?php if ($data['user_active'] == 1) : ?>
                            <a href="" data-target="#modal-update<?= $data['id']; ?>" data-toggle="modal"><i class="fe-check-square" style="color: green;"></i></a>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                          <?php if ($data['user_active'] == 0) : ?>
                            <a href="" data-target="#modal-update<?= $data['id']; ?>" data-toggle="modal"><i class="fe-x-square" style="color: red;"></i></a>
                          <?php endif; ?>
                        </td>
                        <td class="text-center"><?= $data['created_at']; ?></td>
                        <td class="text-center"><?= $data['updated_at']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div><!-- end col-->
      </div>
      <!-- end row-->
    </div>
  </div>

  <!-- add modal content -->
  <div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <form action="<?= base_url('backend/users/') ?>" class="parsley-examples" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Tambah Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama<span class="text-danger">*</span></label>
                  <input type="text" name="nama" value="<?= set_value('nama') ?>" required placeholder="Enter nama" class="form-control " id="nama">

                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="username">Username<span class="text-danger">*</span></label>
                  <input type="text" name="username" value="<?= set_value('username') ?>" placeholder="Enter username" class="form-control" id="username" required>

                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="email">Email<span class="text-danger">*</span></label>
              <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Enter email" class="form-control" id="email" required>
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password<span class="text-danger">*</span></label>
                  <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Enter password" class="form-control" id="pass2" data-parsley-minlength="6" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="konf_pass">Konfirmasi Password<span class="text-danger">*</span></label>
                  <input type="password" name="konf_pass" value="<?= set_value('konf_pass') ?>" data-parsley-equalto="#pass2" data-parsley-minlength="6" placeholder="Konfirmasi password" class="form-control" id="konf_pass" required>
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="user_id">Tipe User<span class="text-danger">*</span></label>
              <select name="user_id" id="user_id" class="form-control">
                <?php foreach ($get_role as $role) : ?>
                  <option value="<?= $role['role_id'] ?>"><?= $role['tipe_user'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div><!-- /.modal-content -->
      </form>

    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!-- update modal content -->
  <?php foreach ($get_users as $user) : ?>
    <div id="modal-update<?= $user['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
      <div class="modal-dialog">

        <form action="<?= base_url('backend/users/edit') ?>" class="parsley-examples" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="standard-modalLabel">Ubah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

              <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">Nama<span class="text-danger">*</span></label>
                    <input type="text" name="nama" value="<?= $user['nama'] ?>" placeholder="Enter nama" required readonly class="form-control" id="nama">

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username<span class="text-danger">*</span></label>
                    <input type="text" name="username" value="<?= $user['username'] ?>" required readonly placeholder="Enter username" class="form-control" id="username">

                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input type="email" name="email" value="<?= $user['email'] ?>" required placeholder="Enter email" readonly class="form-control" id="email">
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
              </div>

              <div class="form-check">
                <input type="checkbox" name="user_active" <?php if ($user['user_active'] == 1) : ?> checked class="form-check-input" value="<?= $user['user_active'] ?>" <?php else : ?> <?php endif; ?> value="1">
                <label for="user_active">Aktifasi<span class="text-danger">*</span></label>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </div><!-- /.modal-content -->
        </form>

      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <?php endforeach; ?>