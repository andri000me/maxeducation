<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo-max-education21-1041x635.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

  <script src="<?= base_url() ?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>

  <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert.css">

  <script src="<?= base_url() ?>assets/sweetalert/sweetalert.js"></script>

  <!-- <script src="<?= base_url() ?>assets/axios/axios.min.js"></script> -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114932927-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114932927-1');
  </script>


</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= site_url() ?>siswa" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MAX</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>MAX</b> Education</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <!-- <img src="<?= base_url('uploads/images/avatars/'.$user_siswa->avatar) ?>" class="user-image" alt="User Image"> -->
               <?php if (empty($user_siswa->avatar)): ?>
                <img src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>" class="user-image" alt="User Image">

              <?php else: ?>
                <img src="<?= base_url('uploads/images/avatars/'.$user_siswa->avatar) ?>" class="user-image" alt="User Image">
              <?php endif ?>

              <span class="hidden-xs"><?= $user_siswa->nama_lengkap ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if (empty($user_siswa->avatar)): ?>
                  <img src="<?= base_url('uploads/images/avatars/avatar.jpg') ?>" class="img-circle" alt="User Image">

                <?php else: ?>
                  <img src="<?= base_url('uploads/images/avatars/'.$user_siswa->avatar) ?>" class="img-circle" alt="User Image">
                <?php endif ?>

                <!-- <img src="<?= base_url('uploads/images/avatars/'.$user_siswa->avatar) ?>" class="img-circle" alt="User Image"> -->
                <p>
                  <?= $user_siswa->nama_lengkap ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Pengaturan Akun</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Jadwal Mengajar</a>
                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Absensi</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Pembayaran</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" id="btnLogout">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?= $sitebar ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="http://maxeducation.id/" target="_blank">MAX Education</a>.</strong> All rights
    reserved.
  </footer>

  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <!-- Morris.js charts -->
  <script src="<?= base_url() ?>assets/admin/bower_components/raphael/raphael.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url() ?>assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?= base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url() ?>assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url() ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?= base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?= base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="<?= base_url() ?>assets/admin/dist/js/pages/dashboard.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>

  <script>
    const URL_LOGOUT = `<?= site_url('logout') ?>`;

    $(document).ready(() => {

      $('#btnLogout').on('click', () => {
        swal({
          title: "Yakin Ingin Keluar ?",
          text: "Apakah Kamu Yakin Ingin Keluar Dari Halaman Ini ??",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Keluar",
          closeOnConfirm: true,
          dangerMode: true,
        }, () => {
          axios({
            method: 'POST',
            url: `${URL_LOGOUT}`,
          })
          .then((response) => {
            location.reload();
            // console.log(response);
          })
          .catch((err) => {
            // console.log(err);
            swal("Error", "Terdapat Kesalahan", "error");
          });
        });          
      });



    });
  </script>
</body>
</html>
