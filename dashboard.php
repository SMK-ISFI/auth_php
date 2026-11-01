<?php
require_once "config/auth.php";

$name = $_SESSION["user_name"];
$email = $_SESSION["user_email"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
  <nav class="navbar navbar-dark bg-primary">
    <div class="container">
      <span class="navbar-brand">
        Aplikasi Autentikasi
      </span>
    </div>
  </nav>

  <div class="container py-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">

        <h3>
          Selamat datang
          <?= htmlspecialchars(
            $name,
            ENT_QUOTES,
            "UTF-8"
          ) ?>
        </h3>

        <p class="text-muted">
          Anda berhasil login ke aplikasi.
        </p>

        <hr>

        <p>
          <strong>Nama: </strong>
          <?= htmlspecialchars(
            $name,
            ENT_QUOTES,
            "UTF-8"
          ) ?>
        </p>

        <p>
          <strong>Email: </strong>
          <?= htmlspecialchars(
            $email,
            ENT_QUOTES,
            "UTF-8"
          ) ?>
        </p>

        <form action="logout.php" method="POST">
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>