<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - Sistem Akademik</title>
    <link rel="stylesheet" href="<?= base_url('dist/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/school.css') ?>">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-panel">
            
            <div class="text-center mb-4">
                <i class="fa fa-graduation-cap fa-3x text-primary"></i>
                <h3 class="login-title mt-3">Sistem Akademik Sekolah</h3>
                <p class="text-muted">Kelas XI Rekayasa Perangkat Lunak</p>
            </div>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>
            
            <form method="post" action="<?= site_url('login') ?>">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" value="<?= old('username') ?>" autocomplete="username">
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="current-password">
                </div>
                
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="fa fa-sign-in"></i> Login
                </button>
            </form>
            
            <div class="text-center mt-3 text-muted">
                <small>Akun latihan: admin / admin123</small>
            </div>
            
        </div>
    </div>
    
    <script src="<?= base_url('dist/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('dist/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>