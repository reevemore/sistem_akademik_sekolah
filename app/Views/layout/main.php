<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= esc($title ?? 'Sistem Akademik') ?></title>

    <link rel="stylesheet" href="<?= base_url('dist/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/school.css') ?>">
</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">

        <header class="main-header">
            <a href="<?= site_url('beranda') ?>" class="logo blue-bg">
                <span class="logo-mini"><b>SA</b></span>
                <span class="logo-lg"><b>Akademik</b></span>
            </a>
            <nav class="navbar blue-bg navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i> <?= esc(session('nama')) ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('logout') ?>">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="info" style="left:15px">
                        <p><?= esc(session('nama')) ?></p>
                        <small>Administrator</small>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU UTAMA</li>
                    <li>
                        <a href="<?= site_url('beranda') ?>">
                            <i class="fa fa-home"></i> <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('dashboard') ?>" class="<?= uri_string()==='dashboard' || str_starts_with(uri_string(),'dashboard/') ? 'active' : '' ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('kelas') ?>" class="<?= uri_string()==='kelas' || str_starts_with(uri_string(),'kelas/') ? 'active' : '' ?>">
                            <i class="fa fa-building"></i> <span>Data Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('guru') ?>" class="<?= uri_string()==='guru' || str_starts_with(uri_string(),'guru/') ? 'active' : '' ?>">
                            <i class="fa fa-user"></i> <span>Data Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('siswa') ?>" class="<?= uri_string()==='siswa' || str_starts_with(uri_string(),'siswa/') ? 'active' : '' ?>">
                            <i class="fa fa-users"></i> <span>Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('mapel') ?>" class="<?= uri_string()==='mapel' || str_starts_with(uri_string(),'mapel/') ? 'active' : '' ?>">
                            <i class="fa fa-book"></i> <span>Mapel</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('jadwal') ?>" class="<?= uri_string()==='jadwal' || str_starts_with(uri_string(),'jadwal/') ? 'active' : '' ?>">
                            <i class="fa fa-calendar"></i> <span>Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('nilai') ?>" class="<?= uri_string()==='nilai' || str_starts_with(uri_string(),'nilai/') ? 'active' : '' ?>">
                            <i class="fa fa-pencil-square-o"></i> <span>Input Nilai</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('rekap-nilai') ?>" class="<?= uri_string()==='rekap-nilai' || str_starts_with(uri_string(),'rekap-nilai/') ? 'active' : '' ?>">
                            <i class="fa fa-table"></i> <span>Rekap Nilai</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('laporan') ?>" class="<?= uri_string()==='laporan' || str_starts_with(uri_string(),'laporan/') ? 'active' : '' ?>">
                            <i class="fa fa-print"></i> <span>Laporan</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <h1><?= esc($title ?? '') ?></h1>
                        </div>
                        <div class="col-md-4 text-right">
                            <?= $headerAction ?? '' ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= esc(session()->getFlashdata('success')) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->renderSection('content') ?>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>Mini Project Kelas XI RPL</strong> — Sistem Akademik Sekolah.
        </footer>

    </div>

    <script src="<?= base_url('dist/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('dist/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('dist/js/niche.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>