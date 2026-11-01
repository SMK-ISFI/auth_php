<?php

require_once "config/session.php";
require_once "config/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: login.php");
  exit;
}

if (isset($_SESSION["user_id"])) {
  header("Location: dashbord.php");
  exit;
}

// Mengambil nilai pada setiap input
$email = strtolower(trim($_POST["email"]));
$password = $_POST["password"];

$loginError = "Email atau password salah.";

// Validasi email dan password
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === "") {
  // buat session login error menyimpan pesan dari variabel $loginError
  $_SESSION["login_error"] = $loginError;

  header("Location: login.php");
  exit;
}

// Cari pengguna berdasarkan email
$query = "SELECT 
          id, name, email, password 
          FROM users 
          WHERE email = '$email'
          LIMIT 1";

$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Jika email tidak terdaftar atau password salah
if (!$user || !password_verify($password, $user["password"])) {
  $_SESSION["login_error"] = $loginError;

  header("Location: login.php");
  exit;
}

// Perbarui session ID setelah login berhasil
session_regenerate_id(true);

// Simpan informasi pengguna
$_SESSION["user_id"] = $user["id"];
$_SESSION["user_name"] = $user["name"];
$_SESSION["user_email"] = $user["email"];

$_SESSION["last_activity"] = time();

// Masuk ke dashboard
header("Location: dashboard.php");
exit;
