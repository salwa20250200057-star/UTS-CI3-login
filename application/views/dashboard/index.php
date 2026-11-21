<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Library</title>
    <link href="<?= base_url('assets/sb-admin/css/styles.css'); ?>" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="<?= site_url('dashboard'); ?>">Library</a>
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item"><span class="nav-link"><?= html_escape($name); ?></span></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('user/logout'); ?>">Logout</a></li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="<?= site_url('dashboard'); ?>">Dashboard</a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <div class="alert alert-success mt-3">
                    Selamat datang, <strong><?= html_escape($name); ?></strong>. Login berhasil.
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
