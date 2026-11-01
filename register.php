<?php
require_once "config/session.php";

// memeriksa pengguna sudah login
if (isset($_SESSION["user_id"])) {
  header("Location: dashboard.php");
  exit;
}

// mengambil pesan error
$errors = $_SESSION["errors"] ?? [];

unset($_SESSION["errors"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Akun</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <div class="card shadow-sm">
          <div class="card-body p-4">

            <h3 class="mb-2">Daftar Akun</h3>
            <p class="text-muted">
              Buat akun untuk menggunakan aplikasi
            </p>

            <form action="register-process.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" />
                <small class="text-danger"><?= htmlspecialchars($errors["name"] ?? "", ENT_QUOTES, "UTF-8") ?></small>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" />
                <small class="text-danger"><?= htmlspecialchars($errors["email"] ?? "", ENT_QUOTES, "UTF-8") ?></small>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
                <small class="text-danger"><?= htmlspecialchars($errors["password"] ?? "", ENT_QUOTES, "UTF-8") ?></small>
              </div>

              <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                <small class="text-danger"><?= htmlspecialchars($errors["confirm_password"] ?? "", ENT_QUOTES, "UTF-8") ?></small>
              </div>

              <button class="btn btn-primary w-100">Daftar</button>
            </form>

            <p class="text-center mt-3 mb-0">
              Sudah punya akun?
              <a href="login.php">Login</a>
            </p>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>