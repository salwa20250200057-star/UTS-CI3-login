<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi - Library</title>
    <link href="<?= base_url('assets/sb-admin/css/styles.css'); ?>" rel="stylesheet" />
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Buat Akun</h3>
                            </div>
                            <div class="card-body">
                                <?= form_open('user/registration'); ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name="name" type="text"
                                               placeholder="Nama lengkap" value="<?= set_value('name'); ?>" />
                                        <label for="name">Nama lengkap</label>
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email"
                                               placeholder="name@example.com" value="<?= set_value('email'); ?>" />
                                        <label for="email">Email address</label>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password1" name="password1" type="password"
                                               placeholder="Password" />
                                        <label for="password1">Password</label>
                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password2" name="password2" type="password"
                                               placeholder="Ulangi password" />
                                        <label for="password2">Ulangi password</label>
                                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Daftar</button>
                                        </div>
                                    </div>
                                <?= form_close(); ?>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                    <a href="<?= site_url('user'); ?>">Sudah punya akun? Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>