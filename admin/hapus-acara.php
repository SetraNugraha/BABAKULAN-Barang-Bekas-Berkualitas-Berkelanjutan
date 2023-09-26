<?php
include 'config/app.php';
session_start();

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {


    // menerima id barang yang dipilih pengguna
    $id = (int)$_GET['id_acara'];

    if (delete_acara($id) > 0) {
        echo "<script>
                alert('Data Acara Berhasil Dihapus !');
                document.location.href = 'acara.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Acara Gagal Dihapus !');
                document.location.href = 'acara.php';
             </script>";
    }
} else {
    header("Location: login-template.php");
    exit();
}
