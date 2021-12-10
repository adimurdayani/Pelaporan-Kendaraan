<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title><?= $judul;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url('')?>assets/images/icon.ico">

  <!-- plugin css -->
  <link href="<?= base_url('')?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
    rel="stylesheet" type="text/css" />

  <!-- Sweet Alert-->
  <link href="<?= base_url('')?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

  <!-- third party css -->
  <link href="<?= base_url()?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
  <link href="<?= base_url()?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="<?= base_url('')?>assets/css/bootstrap-modern.min.css" rel="stylesheet" type="text/css"
    id="bs-default-stylesheet" />
  <link href="<?= base_url('')?>assets/css/app-modern.min.css" rel="stylesheet" type="text/css"
    id="app-default-stylesheet" />

  <link href="<?= base_url('')?>assets/css/bootstrap-modern-dark.min.css" rel="stylesheet" type="text/css"
    id="bs-dark-stylesheet" disabled />
  <link href="<?= base_url('')?>assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css"
    id="app-dark-stylesheet" disabled />

  <!-- select2 -->
  <link href="<?= base_url('')?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('')?>assets/libs/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet"
    type="text/css" />

  <!-- icons -->
  <link href="<?= base_url('')?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

  <!-- Mapbox -->
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
  <!-- Mapbox js -->
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>

  <!-- Load the `mapbox-gl-geocoder` plugin. -->
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js">
  </script>
  <link rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">

  <!-- Promise polyfill script is required -->
  <!-- to use Mapbox GL Geocoder in IE 11. -->
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

</head>

<body data-layout-mode="detached"
  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

  <!-- Begin page -->
  <div id="wrapper">