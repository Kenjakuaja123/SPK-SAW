<?php
session_start();

// Generate CSRF token jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Zakat Fitrah</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/mosque-logo.png" type="image/png">
    <style>
        .auth-logo {
            background: #2c5f2d;
            border-radius: 50%;
            padding: 1rem;
        }
        .btn-zakat {
            background: #2c5f2d;
            color: white;
            transition: all 0.3s;
        }
        .btn-zakat:hover {
            background: #1e401f;
            color: white;
        }
        .auth-quote {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            right: 2rem;
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="text-center mb-5">
                        <img src="assets/images/mosque-logo.png" alt="Logo Masjid" class="auth-logo" width="100">
                        <h2 class="mt-3 text-success fw-bold">Masjid Jannatun Na'im</h2>
                        <h1 class="auth-title mt-3">Sistem Pengelolaan Zakat Fitrah</h1>
                    </div>
                    
                    <?php if(isset($_SESSION['login_error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= htmlspecialchars($_SESSION['login_error']); unset($_SESSION['login_error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['logout_message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= htmlspecialchars($_SESSION['logout_message']); unset($_SESSION['logout_message']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>

                    <form action="login-act.php" method="post">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" 
                                   placeholder="Nama Pengguna" 
                                   name="username"
                                   required
                                   autofocus
                                   autocomplete="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" 
                                   placeholder="Kata Sandi" 
                                   name="password"
                                   required
                                   autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label" for="showPassword">
                                Tampilkan Password
                            </label>
                        </div>

                        <button type="submit" class="btn btn-zakat btn-block btn-lg shadow-lg mt-5">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                        </button>
                    </form>
                    
                    <div class="text-center mt-5 text-lg">
                        <p class="text-gray-600">
                            Lupa password? 
                            <a href="reset-password.php" class="text-success text-decoration-none">Reset disini</a>.
                        </p>
                        <p class="text-gray-600">
                            © 2024 Masjid Jannatun Na'im 
                            <br>
                            <small>Versi 1.2.0</small>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="
                    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                               url('assets/images/mosque-bg.jpg') center/cover;
                    height: 100%;
                ">
                    <div class="auth-quote text-white p-5">
                        <blockquote class="blockquote">
                            <p class="mb-0 fs-4">
                                <i class="bi bi-quote"></i>
                                "Ambilah zakat dari sebagian harta mereka, dengan zakat itu 
                                kamu membersihkan dan mensucikan mereka..." 
                                <i class="bi bi-quote"></i>
                            </p>
                            <footer class="blockquote-footer text-white-50 mt-3 fs-5">
                                QS. At-Taubah: 103
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle show password
        document.getElementById('showPassword').addEventListener('change', function(e) {
            const passwordField = document.querySelector('input[name="password"]');
            passwordField.type = e.target.checked ? 'text' : 'password';
        });

        // Auto-hide alerts setelah 5 detik
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                new bootstrap.Alert(alert).close();
            });
        }, 5000);
    </script>
</body>

</html>