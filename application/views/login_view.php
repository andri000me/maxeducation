<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman Login MAX Education</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo-max-education21-1041x635.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <style>
    body {
        background: url(<?= base_url() ?>assets/images/space-background.jpeg);

        background-position:center;
        background-size:cover;
        background-repeat:no-repeat;
        background-attachment:fixed;
    }
</style>
</head>

<body class="hold-transition">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= site_url() ?>">
                <img src="<?= base_url('assets/images/logo-max-education21-1041x635.png')?>" class="img-responsive" style="margin: 0 auto;" width="180px;">
            </a>
            
        </div>

        <br>

        <?php if ($this->session->flashdata('message_login')): ?>
            <div class="alert alert-danger" style="text-align: center;"><?= $this->session->flashdata('message_login') ?></div>
        <?php endif ?>

        <?php echo validation_errors(); ?>

        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="<?= site_url('user/login') ?>" method="POST">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="fa fa-key form-control-feedback">
                </span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Bootstrap Core Js -->
<script src=".<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>