<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>H.Edi Putra Simping</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= base_url('assets/') ?>img/logo.png" />
    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/img/logo.png'); ?>");
            background-repeat: no-repeat;
            background-size: 80%;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="clearfix">
                                            <button type="button" name="lupa" id="lupa" class="width-35 pull-right btn btn-primary btn-user btn-block">
                                                <i class="ace-icon fa fa-lock"></i>
                                                <span class="bigger-110">Lupa Password</span>
                                            </button>
                                            <button type="button" name="login" id="login" class="width-35 pull-right btn btn-primary btn-user btn-block">
                                                <i class="ace-icon fa fa-key"></i>
                                                <span class="bigger-110">Login</span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="modal fade" id="modal-Lupa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        Masukkan Username yang ingin dilupa password
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <fieldset>
                            <input type="text" class="form-control form-control-user" id="username_lupa" name="username_lupa" placeholder="Username">
                            <div class="space"></div>
                            <div class="clearfix">
                                <button type="button" name="lupa_pass" id="lupa_pass" class="width-35 pull-right btn btn-primary btn-user btn-block">
                                    <i class="ace-icon fa fa-key"></i>
                                    <span class="bigger-110">Lupa Password</span>
                                </button>
                            </div>

                            <div class="space-4"></div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/sweetalert.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#lupa', function() {
                $('#modal-Lupa').modal('show');
            });
            $('#lupa_pass').click(function(e) {

                var username_lupa = $('#username_lupa').val();
                if (username_lupa == "") {
                    swal("Gagal", "Username Harus Diisi", "error").then(function() {
                        $("#username").focus().select();
                    });
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "auth/proses_lupa",
                    data: 'username=' + username_lupa,
                    dataType: "text",
                    cache: false,
                    success: function(data) {
                        var header = data.split("\t");
                        switch (header[0]) {
                            case 'OK':
                                swal("Success", "Password kembali ke password awal dibuat", "success").then(function() {
                                    location.href = "<?php echo base_url(); ?>auth";
                                });
                                break;
                            case 'GAGAL':
                                console.log("gagal")
                                swal("Gagal", "Username Salah", "error");
                                // swal("Gagal", "Username Salah", "error").then(function() {
                                //     location.href = "<?php echo base_url(); ?>auth";
                                // });
                                break;
                            default:
                                swal("Gagal", header[0], "error");
                        }
                    }
                });

                e.preventDefault();
            });
            $('#login').click(function(e) {

                var username = $('#username').val();
                var password = $('#password').val();
                if (username == "") {
                    swal("Gagal", "Username Harus Diisi", "error").then(function() {
                        $("#username").focus().select();
                    });
                    return false;
                }

                if (password == "") {
                    swal("Gagal", "Password Harus Diisi", "error").then(function() {
                        $("#password").focus().select();
                    });
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "auth/proses",
                    data: 'username=' + username + '&password=' + password,
                    dataType: "text",
                    cache: false,
                    success: function(data) {
                        var header = data.split("\t");
                        switch (header[0]) {
                            case 'OK':
                                swal("Success", "Login Berhasil", "success").then(function() {
                                    location.href = "<?php echo base_url(); ?>dashboard";
                                });
                                break;
                            case 'GAGAL':
                                swal("Gagal", "Username Atau Password Salah", "error").then(function() {
                                    location.href = "<?php echo base_url(); ?>auth";
                                });
                                break;
                            default:
                                swal("Gagal", header[0], "error");
                        }
                    }
                });
            });

        });
    </script>
</body>

</html>