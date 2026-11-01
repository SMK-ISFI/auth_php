<?php

require_once "config/session.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: login.php");
  exit;
}

// Hapus seluruh data session
$_SESSION = [];

// Hapus cookie session
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();

  setcookie(
    session_name(),
    "",
    [
      "expires" => time() - 3600,
      "path" => $params["path"],
      "domain" => $params["domain"],
      "secure" => $params["secure"],
      "httponly" => $params["httponly"],
      "samesite" => $params["samesite"]
    ]
  );
}

session_destroy();

header("Location: login.php");
exit;
