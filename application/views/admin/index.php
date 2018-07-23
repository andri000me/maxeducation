<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title?></title>
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo-max-education21-1041x635.png" type="image/x-icon">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- <link type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css" rel="stylesheet"> -->

  


  <!-- jQuery 3 -->
  <!-- <script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script> -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="<?= base_url() ?>assets/sweetalert/sweetalert.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/select2/dist/js/select2.min.js"> -->

  <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> -->

  <!-- DataTables -->
  <script src="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/js/jquery.dataTables.min.js"></script>

  <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

  <script src="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js"></script>

  <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114932927-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114932927-1');
  </script>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav fixed">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="<?= site_url() ?>admin" class="navbar-brand"><b>Maximize Yourself</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
              </div>
            </form>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?= base_url('uploads/images/avatars/'.$user_admin->avatar) ?>" class="user-image" >
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?= $user_admin->nama_lengkap_admin ?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?= base_url('uploads/images/avatars/'.$user_admin->avatar) ?>" class="img-circle" >

                    <p>
                      <?= $user_admin->nama_lengkap_admin ?> - <?= $user->username ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?= site_url()?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat" id="btnLogout">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->

    <?= $content ?>

    <div class="modal fade" id="modal_detail_siswa" role="document">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Detail Siswa</h4>
            </div>
            <div class="modal-body">
              <div id="detail_siswa">
                <form>
                  <fieldset disabled>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama_lengkap_siswa">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" class="form-control" id="jenis_kelamin_siswa">
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <input type="text" class="form-control" id="agama_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP Siswa</label>
                      <input type="text" class="form-control" id="nomor_hp_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP Ayah</label>
                      <input type="text" class="form-control" id="nomor_hp_ayah_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP Ibu</label>
                      <input type="text" class="form-control" id="nomor_hp_ibu_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nama Orang Tua</label>
                      <input type="text" class="form-control" id="nama_orang_tua_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nomor HP Saudara Serumah</label>
                      <input type="text" class="form-control" id="nomor_hp_saudara_serumah_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nomor Telepon Rumah</label>
                      <input type="text" class="form-control" id="nomor_telepon_rumah_siswa">
                    </div>
                    <div class="form-group">
                      <label>Alamat Lengkap</label>
                      <textarea class="form-control" rows="4" id="alamat_lengkap_siswa"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Domisili</label>
                      <input type="text" class="form-control" id="domisili_siswa">
                    </div>
                    <div class="form-group">
                      <label>Tingkat Sekolah</label>
                      <input type="text" class="form-control" id="tingkat_sekolah_siswa">
                    </div>
                    <div class="form-group">
                      <label>Program</label>
                      <input type="text" class="form-control" id="program_siswa">
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" class="form-control" id="kelas_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nama Sekolah</label>
                      <input type="text" class="form-control" id="nama_sekolah_siswa">
                    </div>
                    <div class="form-group">
                      <label>Mata Pelajaran</label>
                      <div id="mata_pelajaran_siswa">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Hari</label>
                      <div id="hari_siswa">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jam</label>
                      <div id="jam_siswa">

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Mendaftar Pada</label>
                      <input type="text" class="form-control" id="mendaftar_pada_siswa">
                    </div>
                    
                  </fieldset>
                </form>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.2.0
          </div>
          <strong>Copyright &copy; 2018 <a href="http://www.maxeducation.id/" target="_blank">MAX Education</a>.</strong> All rights
          reserved.
        </div>
        <!-- /.container -->
      </footer>
    </div>
    <!-- ./wrapper -->


    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>

    <script>
      const URL_LOGOUT = `<?= site_url('logout') ?>`;

      $(document).ready(() => {
        $('#btnLogout').click(() => {
          swal({
            title: "Yakin Ingin Keluar ?",
            text: "Apakah Kamu Yakin Ingin Keluar Dari Halaman Ini ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then(willLogout => {
            if (willLogout) {
              location.href = `${URL_LOGOUT}`;
            }
          });

        });
      });

      

    </script>

  </body>
  </html>
