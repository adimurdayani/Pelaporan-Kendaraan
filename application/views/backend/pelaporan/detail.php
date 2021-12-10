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
                <li class="breadcrumb-item"><a href="<?= base_url('backend/dashboard')?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('backend/pelaporan')?>">Tabel Laporan</a></li>
                <li class="breadcrumb-item active"><?= $judul;?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul;?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-xl-8 col-lg-7">
          <!-- project card -->
          <div class="card d-block">
            <div class="card-body">

              <h4 class="mb-3 mt-0 font-18">Data Detail Identitas Pelapor</h4>

              <div class="clerfix"></div>

              <div class="row">
                <div class="col-md-4">
                  <!-- Ticket type -->
                  <label class="mt-2 mb-1">Nama Lengkap :</label>
                  <p>
                    <i class='fe-user font-18 text-success mr-1 align-middle'></i> <?= $get_laporan_id['nama_pelapor']?>
                  </p>
                  <!-- end Ticket Type -->
                </div>
              </div> <!-- end row -->

              <div class="row">
                <div class="col-md-6">
                  <!-- Alamat Pelapor -->
                  <label class="mt-2 mb-1">Kelurahan Pelapor :</label>
                  <div class="media">
                    <div class="media-body">
                      <p>
                        <i class='fe-map-pin font-18 text-primary mr-1 align-middle'></i>
                        <?= $get_laporan_id['kelurahan']?>
                      </p>
                    </div>
                  </div>
                  <!-- end Reported by -->
                </div> <!-- end col -->

                <div class="col-md-6">
                  <!-- Alamat Pelapor -->
                  <label class="mt-2 mb-1">Kecamatan Pelapor :</label>
                  <div class="media">
                    <div class="media-body">
                      <p>
                        <i class='fe-map-pin font-18 text-primary mr-1 align-middle'></i>
                        <?= $get_laporan_id['kecamatan']?>
                      </p>
                    </div>
                  </div>
                  <!-- end Reported by -->
                </div> <!-- end col -->

              </div> <!-- end row -->

              <div class="row">
                <div class="col-md-6">
                  <!-- assignee -->
                  <label class="mt-2 mb-1">Created On :</label>
                  <p>
                    <i class='fe-clock font-18 text-warning mr-1 align-middle'></i>
                    <?= $get_laporan_id['created_at']?>
                  </p>
                  <!-- end assignee -->
                </div> <!-- end col -->

                <div class="col-md-6">
                  <!-- assignee -->
                  <label class="mt-2 mb-1">Updated On :</label>
                  <p>
                    <i class='fe-clock font-18 text-warning mr-1 align-middle'></i>
                    <?= $get_laporan_id['updated_at']?>
                  </p>
                  <!-- end assignee -->
                </div> <!-- end col -->
              </div> <!-- end row -->

              <div class="row">
                <div class="col-md-6">
                  <!-- Status -->
                  <label class="mt-2 mb-1">Status :</label>
                  <?php if($get_laporan_id['status'] == 1):?>
                  <div class="badge badge-success"> <i class="fe-check-square"></i> Dalam Proses </div>
                  <?php else:?>
                  <div class="badge badge-warning"> <i class="fe-clock"></i> Diproses </div>
                  <?php endif;?>
                  <!-- end Status -->
                </div> <!-- end col -->

              </div> <!-- end row -->

              <label class="mt-4 mb-1">Keterangan :</label>

              <p class="text-muted mb-0">
                <?= $get_laporan_id['keterangan']?>
              </p>

            </div> <!-- end card-body-->

          </div> <!-- end card-->
          <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-4 col-lg-5">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title font-16 mb-3">Bukti Pelaporan</h5>

              <div class="card mb-1 shadow-none border">
                <div class="p-2 text-center">
                  <img src="<?= base_url('assets/images/uploads/') . $get_laporan_id['stnk']?>" alt="" width="250px">
                </div>
              </div>

              <div class="card mb-1 shadow-none border">
                <div class="p-2 text-center">
                  <img src="<?= base_url('assets/images/uploads/') . $get_laporan_id['bpkb']?>" alt="" width="250px">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

    </div> <!-- container -->

  </div> <!-- content -->