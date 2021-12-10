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
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $judul?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-4 col-xl-4">
          <div class="card-box text-center">
            <img src="<?= base_url()?>assets/images/users/user-tie-solid.svg"
              class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

            <h4 class="mb-0"><?= $users_ses['nama']?></h4>
            <p class="text-muted"><?= $users_ses['username']?></p>

            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

            <div class="text-left mt-3">
              <h4 class="font-13 text-uppercase">About Me :</h4>
              <p class="text-muted font-13 mb-3">
                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                1500s, when an unknown printer took a galley of type.
              </p>
              <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Geneva
                  D. McKnight</span></p>

              <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">(123)
                  123 1234</span></p>

              <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">user@email.domain</span>
              </p>

              <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p>
            </div>

            <ul class="social-list list-inline mt-3 mb-0">
              <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                    class="mdi mdi-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                    class="mdi mdi-google"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                    class="mdi mdi-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                    class="mdi mdi-github"></i></a>
              </li>
            </ul>
          </div> <!-- end card-box -->

        </div> <!-- end col-->

      </div>
      <!-- end row-->

    </div> <!-- container -->

  </div> <!-- content -->