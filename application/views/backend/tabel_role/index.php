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
                <li class="breadcrumb-item"><a href="<?= base_url('backend/dashboard/')?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $judul;?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul;?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <a href="javascript:void(0);" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add"><i
                  class="fe-plus"></i> Tambah</a>
              <?= $this->session->flashdata('message');?>

              <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align: middle; text-align: center;"></th>
                    <th rowspan="2" style="vertical-align: middle; text-align: center;">No.</th>
                    <th rowspan="2" style="vertical-align: middle; text-align: center;">Tipe User</th>
                    <th colspan="2" class="text-center">Waktu/Tanggal</th>
                  </tr>
                  <tr>
                    <th class="text-center">Tanggal Buat</th>
                    <th class="text-center">Tanggal Update</th>
                  </tr>
                </thead>


                <tbody>
                  <?php $no = 1; foreach($get_role as $data):?>
                  <tr>
                    <td>
                      <a href="javascript:void(0);" class="badge badge-warning"
                        data-target="#modal-update<?= $data['role_id'];?>" data-toggle="modal"><i class="fe-edit"
                          title="Edit"></i></a>
                      <a href="<?= base_url('backend/role/hapus/') . $data['role_id']?>"
                        class="badge badge-danger hapus"><i class="fe-trash" title="Hapus"></i></a>
                    </td>
                    <td><?= $no++;?></td>
                    <td><?= $data['tipe_user'];?></td>
                    <td><?= $data['created_at'];?></td>
                    <td><?= $data['updated_at'];?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>

            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div><!-- end col-->
      </div>
      <!-- end row-->
    </div>
  </div>

  <!-- add modal content -->
  <div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">

      <form action="<?= base_url('backend/role')?>" class="parsley-examples" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Tambah Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="tipe_user">Tipe User<span class="text-danger">*</span></label>
              <input type="text" name="tipe_user" value="<?= set_value('tipe_user')?>" parsley-trigger="change" required
                placeholder="Enter tipe user" class="form-control" id="tipe_user">
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
  <?php foreach($get_role as $role):?>
  <div id="modal-update<?= $role['role_id']?>" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <form action="<?= base_url('backend/role/edit')?>" class="parsley-examples" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Ubah Role</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
          </div>
          <div class="modal-body">

            <input type="hidden" name="role_id" id="role_id" value="<?= $role['role_id']?>">

            <div class="form-group">
              <label for="tipe_user">Tipe User<span class="text-danger">*</span></label>
              <input type="text" name="tipe_user" parsley-trigger="change" required value="<?= $role['tipe_user']?>"
                class="form-control" id="tipe_user">
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
  <?php endforeach;?>