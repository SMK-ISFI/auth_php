<?php

require_once __DIR__ . "/session.php";

// Periksa status login
if (empty($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}

// Batasi waktu tidak aktif menjadi 30 menit
$timeout = 30 * 60;

if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"]) > $timeout) {
  $_SESSION = [];
  session_destroy();

  header("Location: login.php");
  exit;
}

// Perbarui waktu aktivitas
$_SESSION["last_activity"] = time();
