<?php
require_once "config/session.php";

// memeriksa pengguna sudah login
if (isset($_SESSION["user_id"])) {
  header("Location: dashboard.php");
  exit;
}

// Mengambil pesan login gagal
$error = $_SESSION["login_error"] ?? "";

// Mengambil pesan sukses register
$success = $_SESSION["success"] ?? "";

unset(
  $_SESSION["login_error"],
  $_SESSION["success"]
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <div class="card shadow-sm">
          <div class="card-body p-4">

            <h3>Login</h3>
            <p class="text-muted">
              Masuk menggunakan akun anda.
            </p>

            <?php if ($success): ?>
              <div class="alert alert-success">
                <?= htmlspecialchars($success, ENT_QUOTES, "UTF-8") ?>
              </div>
            <?php endif; ?>

            <?php if ($error): ?>
              <div class="alert alert-danger">
                <?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?>
              </div>
            <?php endif; ?>

            <form action="login-process.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" />
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
              </div>

              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <p class="text-center mt-3 mb-0">
              Belum punya akun?
              <a href="register.php">Daftar</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>