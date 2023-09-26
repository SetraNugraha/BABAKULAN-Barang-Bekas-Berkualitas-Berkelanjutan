<?php
session_start();
$tittle = 'Edit Acara';
include 'layout/header.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

    //mengambil id barang dari URL
    $id = (int)$_GET['id_acara'];

    $acara = select("SELECT * FROM acara WHERE id_acara = $id")[0];

    // cek apakah tombol tambah ditekan
    if (isset($_POST['edit-acara'])) {
        if (update_acara($_POST) > 0) {
            echo "<script>
                alert('Data Acara Berhasil Diperbaharui !');
                document.location.href = 'acara.php';
             </script>";
        } else {
            echo "<script>
                alert('Data Acara Gagal Diperbaharui !');
                document.location.href = 'acara.php';
             </script>";
        }
    }


?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fas fa-edit"></i> Edit Data Acara</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="" method="post" enctype="multipart/form-data" style="width: 50%; margin-left: 40px; min-height:900px">

                    <input type="hidden" name="id_acara" value="<?= $acara['id_acara']; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $acara['gambar_acara']; ?>">

                    <div class="mb-3">
                        <label for="nama_acara" class="form-label">Nama Acara</label>
                        <input type="text" class="form-control" id="nama_acara" name="nama_acara" value="<?= $acara['nama_acara']; ?>" placeholder="Nama Acara ...">
                    </div>

                    <div class=" mb-3">
                        <label for="tgl_acara" class="form-label">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control" id="tgl_acara" name="tgl_acara" value="<?= $acara['tgl_acara']; ?>" placeholder="Tanggal Pelaksanaan Acara ...">
                    </div>

                    <div class="mb-3">
                        <label for="tempat_acara" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="tempat_acara" name="tempat_acara" value="<?= $acara['tempat_acara']; ?>" placeholder="Tempat Acara ...">
                    </div>

                    <div class="mb-3">
                        <label for="gambar_acara" class="form-label">Gambar</label> <br>
                        <input type="file" class="form-control mt-2" id="gambar_acara" onchange="previewImg()" name="gambar_acara" value="<?= $acara['gambar_acara']; ?>">

                        <img src="" alt="" class="img-thumbnail img-preview mt-2" width="300px">
                    </div>

                    <div class=" mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $acara['deskripsi']; ?>" placeholder="Deskripsi Acara ...">
                    </div>

                    <a href="acara.php" class="btn btn-danger" style="float: right;">Cancel</a>
                    <button type="submit" name="edit-acara" class="btn btn-warning mb-3" style="float: right; margin-right: 10px; color: white;">Edit</button>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>


    <script>
        // preview image
        function previewImg() {
            const gambar = document.querySelector('#gambar_acara');
            const imgPreview = document.querySelector('.img-preview');

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

<?php

} else {
    header("Location: login-template.php");
    exit();
}

include 'layout/footer.php';

?>