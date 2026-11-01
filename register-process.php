<?php

require_once "config/session.php";
require_once "config/database.php";

// memeriksa method pengiriman harus POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: register.php");
  exit;
}

// memeriksa pengguna sudah login
if (isset($_SESSION["user_id"])) {
  header("Location: dashboard.php");
  exit;
}

// Mengambil nilai pada setiap input
$name = trim($_POST["name"]);
$email = strtolower(trim($_POST["email"]));
$password = $_POST["password"];
$confirmPassword = $_POST["confirm_password"];

$errors = [];

// Validasi input nama
if ($name === "") {
  $errors["name"] = "Nama wajib diisi";
} elseif (strlen($name) > 100) {
  $errors["name"] = "Nama maksimal 100 karakter";
}

// Validasi input email
if ($email === "") {
  $errors["email"] = "Email wajib diisi";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors["email"] = "Format email tidak valid";
} elseif (strlen($email) > 150) {
  $errors["email"] = "Email maksimal 150 karakter";
}

// Validasi input password
if ($password === "") {
  $errors["password"] = "Password wajib diisi";
} elseif (strlen($password) < 8) {
  $errors["password"] = "Password minimal 8 karakter";
} elseif (strlen($password) > 72) {
  $errors["password"] = "Password maksimal 72 karakter";
}

// Validasi konfirmasi password
if ($confirmPassword === "") {
  $errors["confirm_password"] = "Konfirmasi password wajib diisi";
} elseif ($password !== $confirmPassword) {
  $errors["confirm_password"] = "Konfirmasi password tidak cocok";
}

// Periksa email sudah terdaftar
if (!isset($errors["email"]) && $email !== "") {
  $query = "SELECT id FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $errors["email"] = "Email sudah terdaftar";
  }
}

// Kembali ke form register jika terdapat kesalahan
if (!empty($errors)) {
  // Buat session errors dan simpan nilai dari variabel $errors
  $_SESSION["errors"] = $errors;

  header("Location: register.php");
  exit;
}

// Buat ID pengguna
$id = "user-" . random_int(10000000, 99999999);

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Simpan akun ke database
$query = "INSERT INTO 
          users (id, name, email, password)
          VALUES
          ('$id', '$name', '$email', '$hashedPassword')";
mysqli_query($conn, $query);

mysqli_close($conn);
$_SESSION["success"] = "Register berhasil. Silahkan login";

header('Location: login.php');
exit;
