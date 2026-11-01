<?php

// Mencegah PHP menerima session ID belum dikenal
ini_set("session.use_strict_mode", "1");

// Menghindari penggunaan session ID melalui URL
ini_set("session.use_only_cookies", "1");

$isHttps = !empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off";

session_set_cookie_params([
  "lifetime" => 0,
  "path" => "/",
  "secure" => $isHttps, // mengharuskan cookie dikirim melalui HTTPS ketika HTTPS
  "httponly" => true, // mencegah javascript membaca cookie
  "samesite" => "Lax" // mengurangi beberapa risiko pengiriman cookie
]);

session_start();
