<?php

// akses CORS
header("Access-Control-Allow-Origin: *");

// render halaman menjadi json
header('Content-Type: application/json');

require '../config/app.php';

$query = select("SELECT * FROM brg_masuk");

echo json_encode(['produk' => $query]);
