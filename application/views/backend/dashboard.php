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
            <h4 class="page-title"><?= $judul;?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-md-6">
          <div class="card-box">
            <div class="row">
              <div class="col-6">
                <div class="avatar-sm bg-success rounded">
                  <i class="fe-users avatar-title font-22 text-white"></i>
                </div>
              </div>
              <div class="col-6">
                <div class="text-right">
                  <h3 class="text-dark my-1"><i class="fe-database"></i> <span data-plugin="counterup">
                      <?= $get_jumlah;?></span></h3>
                  <p class="text-muted mb-1 text-truncate">Total Users</p>
                </div>
              </div>
            </div>
          </div> <!-- end card-box-->
        </div> <!-- end col -->

        <div class="col-md-6">
          <div class="card-box">
            <div class="row">
              <div class="col-6">
                <div class="avatar-sm bg-info rounded">
                  <i class="fe-file-text avatar-title font-22 text-white"></i>
                </div>
              </div>
              <div class="col-6">
                <div class="text-right">
                  <h3 class="text-dark my-1"><i class="fe-database"></i> <span data-plugin="counterup">
                      <?= $get_jumlah_laporan;?></span></span></h3>
                  <p class="text-muted mb-1 text-truncate">Total Laporan</p>
                </div>
              </div>
            </div>
          </div> <!-- end card-box-->
        </div> <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body">
              <div class="card-widgets">
                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false"
                  aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
              </div>
              <h4 class="header-title mb-0">Lokasi Pelapor</h4>

              <div id="cardCollpase4" class="collapse pt-3 show">
                <div id="map" style="height: 433px"></div>
                <div id="menu">
                  <input id="satellite-v9" type="radio" name="rtoggle" value="satellite">
                  <!-- See a list of Mapbox-hosted public styles at -->
                  <!-- https://docs.mapbox.com/api/maps/styles/#mapbox-styles -->
                  <label for="satellite-v9">Satellite</label>
                  <input id="light-v10" type="radio" name="rtoggle" value="light">
                  <label for="light-v10">Light</label>
                  <input id="dark-v10" type="radio" name="rtoggle" value="dark">
                  <label for="dark-v10">Dark</label>
                  <input id="streets-v11" type="radio" name="rtoggle" value="streets" checked="checked">
                  <label for="streets-v11">Streets</label>
                  <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
                  <label for="outdoors-v11">Outdoors</label>
                </div>
              </div> <!-- collapsed end -->
            </div> <!-- end card-body -->
          </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
          <div class="card">
            <div class="card-body">
              <div class="card-widgets">
                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                  aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
              </div>
              <h4 class="header-title mb-0">Tabel Laporan</h4>

              <div id="cardCollpase5" class="collapse pt-3 show">
                <div class="table-responsive">
                  <table id="basic-datatable" class="table wy-table-responsive w-100">
                    <thead>
                      <tr>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;"></th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">No.</th>
                        <th colspan="4" style="vertical-align: middle; text-align: center;">Identitas</th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;" class="text-center">
                          Kelurahan
                        </th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;" class="text-center">
                          Kecamatan
                        </th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Status</th>
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
                          <a href="<?= base_url('backend/pelaporan/detail/') . $laporan['id']?>"
                            class="badge badge-success"><i class="fe-eye" title="Detail"></i></a>
                        </td>
                        <td><?= $no++;?></td>
                        <td><?= $laporan['nama_pelapor']?></td>
                        <td><?= $laporan['kelamin']?></td>
                        <td><?= $laporan['kecamatan']?></td>
                        <td><?= $laporan['kelurahan']?></td>
                        <td><?= $laporan['no_ktp']?></td>
                        <td><?= $laporan['no_kk']?></td>
                        <td>
                          <?php if($laporan['status'] == 1):?>
                          <div class="badge badge-success">Dalam proses</div>
                          <?php else:?>
                          <div class="badge badge-warning">Diproses</div>
                          <?php endif;?>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div> <!-- end table responsive-->
              </div> <!-- collapsed end -->
            </div> <!-- end card-body -->
          </div> <!-- end card-->
        </div> <!-- end col -->
      </div>
      <!-- end row -->

    </div> <!-- container -->

  </div> <!-- content -->

  <script>
  mapboxgl.accessToken =
    'pk.eyJ1IjoiYWRpbXVyZGF5YW5pIiwiYSI6ImNrcmdyNG9oazBrOTIydnFuc21kYW53YjIifQ.kKTX_r3f99B-LTG5XKmUHA';
  var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [120.1960783, -3.0016046], // starting position
    zoom: 13 // starting zoom
  });

  // create the popup
  var popup = new mapboxgl.Popup({
    offset: 25
  }).setText(
    'Kota Palopo adalah sebuah kota di provinsi Sulawesi Selatan, Indonesia. Kota Palopo sebelumnya berstatus kota administratif sejak 1986 dan merupakan bagian dari Kabupaten Luwu yang kemudian berubah menjadi kota pada tahun 2002 sesuai dengan Undang-Undang Nomor 11 Tahun 2002 tanggal 10 April 2002.Wikipedia'
  );

  // Create a default Marker and add it to the map.
  var marker1 = new mapboxgl.Marker({
      color: 'red'
    })
    .setLngLat([120.1960783, -3.0016046])
    .setPopup(popup)
    .addTo(map);

  // Create a default Marker, colored black, rotated 45 degrees.
  // var marker2 = new mapboxgl.Marker({
  //     color: 'black',
  //     rotation: 45
  //   })
  //   .setLngLat([12.65147, 55.608166])
  //   .addTo(map);

  // Add the control to the map.
  map.addControl(
    new MapboxGeocoder({
      accessToken: mapboxgl.accessToken,
      mapboxgl: mapboxgl
    })
  );

  // Add zoom and rotation controls to the map.
  map.addControl(new mapboxgl.NavigationControl());


  var layerList = document.getElementById('menu');
  var inputs = layerList.getElementsByTagName('input');

  function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle('mapbox://styles/mapbox/' + layerId);
  }

  for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
  }
  </script>