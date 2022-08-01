<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Common form elements and layouts">
    <meta name="author" content="">

    <title>H.Edi Putra Simping</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/sweetalert2.css">
    <link rel="icon" type="image/png" href="<?= base_url('assets/') ?>img/logo.png" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/sweetalert2.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.custom.min.css" /> -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/chosen.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/daterangepicker.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap-colorpicker.min.css" />
    <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?= base_url('assets/img/') ?>logo.png" width="70">
                </div>
                <div class="sidebar-brand-text mx-1">H.Edi Putra Simping</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Simping</span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('simping/tambah_simping') ?>">Tambah Simping</a>
                        <a class="collapse-item" href="<?= base_url('simping/kelola_simping') ?>">Kelola Simping</a>
                    </div>
                </div> -->
            <!-- </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jenis Bahan Baku</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('jenis/tambah_jenis') ?>">Tambah Jenis Bahan Baku</a>
                        <a class="collapse-item" href="<?= base_url('jenis/kelola_jenis') ?>">Kelola Jenis Bahan Baku</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if (($this->session->userdata('role') == "Manajer Produksi") || ($this->session->userdata('role') == "Kepala Operasional") || ($this->session->userdata('role') == "admin")) {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Bahan Baku</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('bahan/tambah_bahan') ?>">Tambah Bahan Baku</a>
                            <a class="collapse-item" href="<?= base_url('bahan/kelola_bahan') ?>">Kelola Bahan Baku</a>
                        </div>
                    </div>
                </li>
            <?php }
            ?>
            <?php if (($this->session->userdata('role') == "Manajer Produksi") || ($this->session->userdata('role') == "admin")) {
            ?>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utilities" aria-expanded="true" aria-controls="utilities">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Produksi</span>
                    </a>
                    <div id="utilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('produksi/tambah_produksi') ?>">Tambah produksi</a>
                            <a class="collapse-item" href="<?= base_url('produksi/kelola_produksi') ?>">Kelola produksi</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cUtilities" aria-expanded="true" aria-controls="cUtilities">
                        <i class="fas fa-fw fa-map"></i>
                        <span>Produk</span>
                    </a>
                    <div id="cUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('produk/tambah_produk') ?>">Tambah Produk</a>
                            <a class="collapse-item" href="<?= base_url('produk/kelola_produk') ?>">Kelola Produk</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Utilities" aria-expanded="true" aria-controls="Utilities">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Peramalan</span>
                    </a>
                    <div id="Utilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('penjualan/tambah_penjualan') ?>">Tambah Peramalan</a>
                            <a class="collapse-item" href="<?= base_url('penjualan/kelola_penjualan') ?>">Kelola Peramalan</a>
                        </div>
                    </div>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('penjualan/jadwal') ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Penjadwalan</span>
                </a>
            </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('laporan/jadwal') ?>">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            <?php }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if ($this->session->userdata('role') == "admin") {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('user/tambah') ?>">Tambah User</a>
                            <a class="collapse-item" href="<?= base_url('user') ?>">Kelola User</a>
                        </div>
                    </div>
                </li>
            <?php }
            ?>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->