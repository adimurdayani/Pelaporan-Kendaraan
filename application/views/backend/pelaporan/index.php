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

              <div class="table-responsive">
                <table id="basic-datatable" class="table wy-table-responsive w-100">
                  <thead>
                    <tr>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;"></th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;">No.</th>
                      <th colspan="4" style="vertical-align: middle; text-align: center;">Identitas</th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;" class="text-center">Kelurahan
                      </th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;" class="text-center">Kecamatan
                      </th>
                      <th rowspan="2" style="vertical-align: middle; text-align: center;" class="text-center">Status
                      </th>
                    </tr>
                    <tr>
                      <th class="text-center">Pelapor</th>
                      <th class="text-center">Kelamin</th>
                      <th class="text-center">No. KTP.</th>
                      <th class="text-center">No. KK.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($data_laporan as $laporan):?>
                    <tr>
                      <td>
                        <a href="<?= base_url('backend/pelaporan/hapus/') . $laporan['id']?>"
                          class="badge badge-danger hapus"><i class="fe-trash" title="Hapus"></i></a> <br>
                        <a href="<?= base_url('backend/pelaporan/detail/') . $laporan['nama_pelapor']?>"
                          class="badge badge-success"><i class="fe-eye" title="Detail"></i></a>
                      </td>
                      <td><?= $no++;?></td>
                      <td><?= $laporan['nama']?></td>
                      <td><?= $laporan['kelamin']?></td>
                      <td><?= $laporan['kecamatan']?></td>
                      <td><?= $laporan['kelurahan']?></td>
                      <td><?= $laporan['no_ktp']?></td>
                      <td><?= $laporan['no_kk']?></td>
                      <td class="text-center">
                        <?php if($laporan['status'] == "MENUNGGU"):?>
                        <a href="" class="badge badge-warning" data-target="#modal-update<?= $laporan['id']?>"
                          data-toggle="modal">MENUNGGU</a>
                        <?php elseif($laporan['status'] == "DIPROSES"):?>
                        <a href="" class="badge badge-info" data-target="#modal-update<?= $laporan['id']?>"
                          data-toggle="modal">DIPROSES</a>
                        <?php elseif($laporan['status'] == "SELESAI"):?>
                        <div class="badge badge-success">SELESAI</div>
                        <?php endif;?>
                      </td>
                    </tr>
                    <?php endforeach;?>
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
  <div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">

      <form action="<?= base_url('backend/pelaporan')?>" class="parsley-examples" method="POST"
        enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

            <h5 class="mb-0" style="text-align: center;">IDENTITAS</h5>
            <hr>

            <div class="form-group">
              <label for="nama_pelapor">Nama Pelapor</label>
              <select name="nama_pelapor" id="nama_pelapor" class="form-control" data-toggle="select2">
                <option value="">No Selected</option>
                <?php foreach($data_user as $user):?>
                <option value="<?= $user['id']?>"><?= $user['nama']?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_kk">No. KK<span class="text-danger">*</span></label>
                  <input type="number" name="no_kk" value="<?= set_value('no_kk')?>" parsley-trigger="change" required
                    placeholder="Enter tipe user" class="form-control" id="no_kk">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_ktp">No. KTP<span class="text-danger">*</span></label>
                  <input type="number" name="no_ktp" value="<?= set_value('no_ktp')?>" parsley-trigger="change" required
                    placeholder="Enter tipe user" class="form-control" id="no_ktp">
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
              <select name="kelamin" id="kelamin" class="form-control" parsley-trigger="change" required>
                <option value="P">Prempuan</option>
                <option value="L">Laki-Laki</option>
              </select>
            </div>

            <h5 class="mb-0" style="text-align: center;">BUKTI KEPEMILIKAN</h5>
            <hr>

            <div class="form-group">
              <label for="no_ken">No. Kendaraan<span class="text-danger">*</span></label>
              <input type="number" name="no_ken" value="<?= set_value('no_ken')?>" parsley-trigger="change" required
                placeholder="Enter nomor kendaraan" class="form-control" id="no_ken">
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-input">
                  <label for="stnk">Upload STNK</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="stnk" name="stnk" parsley-trigger="change"
                      required>
                    <label class="custom-file-label" for="stnk">Pilih file</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <label for="bpkb">Upload BPKB</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="bpkb" name="bpkb" parsley-trigger="change" required>
                  <label class="custom-file-label" for="bpkb">Pilih file</label>
                </div>
              </div>

            </div>

            <h5 class="mb-0" style="text-align: center;">LOKASI KEJADIAN</h5>
            <hr>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="id_kecamatan">Kecamatan</label>
                  <select name="id_kecamatan" id="id_kecamatan" class="form-control" data-toggle="select2">
                    <option value="">No Selected</option>
                    <?php foreach($data_kecamatan as $kecamatan):?>
                    <option value="<?= $kecamatan['id']?>"><?= $kecamatan['kecamatan']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="id_kelurahan">Kelurahan</label>
                  <select name="id_kelurahan" id="id_kelurahan" class="form-control" data-toggle="select2">
                    <option value="">No Selected</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="latitude">Latitude<span class="text-danger">*</span></label>
                  <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Enter latitude"
                    parsley-trigger="change" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="longitude">Longitude<span class="text-danger">*</span></label>
                  <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Enter longitude"
                    parsley-trigger="change" required>
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="no_kendaraan">Keterangan<span class="text-danger">*</span></label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"
                parsley-trigger="change" required></textarea>
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
  <?php foreach($data_laporan as $update):?>
  <div id="modal-update<?= $update['id']?>" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <form action="<?= base_url('backend/pelaporan/edit')?>" class="parsley-examples" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Update Status</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

            <input type="hidden" name="id" id="id" value="<?= $update['id']?>">
            <input type="hidden" name="nama_pelapor" id="nama_pelapor" value="<?= $update['nama_pelapor']?>">

            <div class="form-group">
              <label for="status">Status <span class="text-danger">*</span></label>
              <select name="status" id="nama_status" class="form-control">
                <option value="">Pilih</option>
                <option value="MENUNGGU" <?php if($update['status'] == "MENUNGGU"):?> selected <?php endif;?>>MENUNGGU
                </option>
                <option value="DIPROSES" <?php if($update['status'] == "DIPROSES"):?> selected <?php endif;?>>DIPROSES
                </option>
                <option value="SELESAI" <?php if($update['status'] == "SELESAI"):?> selected <?php endif;?>>SELESAI
                </option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-warning">Update</button>
          </div>
        </div><!-- /.modal-content -->
      </form>

    </div><!-- /.modal-dialog -->
  </div>
  <?php endforeach;?>
  <!-- /.modal -->