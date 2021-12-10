<!-- Footer Start -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <script>
        document.write(new Date().getFullYear())
        </script> &copy; Pelaporan Kendaraan Hilang
      </div>
    </div>
  </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?= base_url()?>assets/js/vendor.min.js"></script>

<!-- select2 -->
<script src="<?= base_url()?>assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url()?>assets/libs/bootstrap-select/js/bootstrap-select.min.js"></script>

<!-- third party js -->
<script src="<?= base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Plugins js-->
<script src="<?= base_url()?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url()?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url()?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
</script>

<script src="<?= base_url()?>assets/libs/parsleyjs/parsley.min.js"></script>

<!-- Init js-->
<script src="<?= base_url()?>assets/js/pages/form-advanced.init.js"></script>

<!-- Dashboard 2 init -->
<script src="<?= base_url()?>assets/js/pages/dashboard-2.init.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url()?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- App js-->
<script src="<?= base_url()?>assets/js/app.min.js"></script>

<script>
$('#id_kecamatan').change(function() {

  var id = $(this).val();

  $.ajax({
    url: "<?= site_url('backend/pelaporan/get_id_kecamatan')?>",
    method: "POST",
    data: {
      id: id
    },
    async: true,
    dataType: 'json',
    success: function(data) {

      var html = '';
      var i;

      for (i = 0; i < data.length; i++) {
        html += '<option value=' + data[i].id + '>' + data[i].kelurahan + '</option>';
      }

      $('#id_kelurahan').html(html);
    }

  });

  return false;

});

$('#id_kec').change(function() {

  var id = $(this).val();

  $.ajax({
    url: "<?= site_url('backend/pelaporan/get_id_kecamatan')?>",
    method: "POST",
    data: {
      id: id
    },
    async: true,
    dataType: 'json',
    success: function(data) {

      var html = '';
      var i;

      for (i = 0; i < data.length; i++) {
        html += '<option value=' + data[i].id_kelurahan + '>' + data[i].kelurahan + '</option>';
      }

      $('#id_kel').html(html);
    }

  });

  return false;

});
</script>

<script>
// upload file
$('.custom-file-input').on('change', function() {
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
// validasi
$(document).ready(function() {
  $(".parsley-examples").parsley()
})

// delete
$('.hapus').on('click', function(e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Anda ingin menghapus data ini!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Iya, hapus!",
    cancelButtonText: "Tidak, Tutup!",
    confirmButtonClass: "btn btn-success mt-2",
    cancelButtonClass: "btn btn-danger ml-2 mt-2",
    buttonsStyling: !1
  }).
  then(function(t) {
    t.value ? Swal.fire({
      document: location.href = href,
      title: "Dihapus!",
      text: "File anda telah di hapus.",
      type: "success"
    }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
      title: "Batal",
      text: "File anda tidak terhapus.",
      type: "error"
    })
  })
})
</script>

<script>
$(document).ready(function() {
  $("#scroll-horizontal-datatable").DataTable({
    scrollX: !0,
    language: {
      paginate: {
        previous: "<i class='mdi mdi-chevron-left'>",
        next: "<i class='mdi mdi-chevron-right'>"
      }
    },
    drawCallback: function() {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
    }
  })
})
$(document).ready(function() {
  $("#basic-datatable").DataTable({
    lengthMenu: [5, 10, 25, 50, 75, 100],
    language: {
      paginate: {
        previous: "<i class='mdi mdi-chevron-left'>",
        next: "<i class='mdi mdi-chevron-right'>"
      }
    },
    drawCallback: function() {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
    }
  })

})
</script>

</body>

</html>