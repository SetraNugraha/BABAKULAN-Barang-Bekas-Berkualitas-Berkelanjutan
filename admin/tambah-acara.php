<?php
session_start();
$tittle = 'Tambah Acara';
include 'layout/header.php';


// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

    // cek apakah tombol tambah ditekan
    if (isset($_POST['tambah'])) {
        if (create_acara($_POST) > 0) {
            echo "<script>
                alert('Data Acara Berhasil Ditambahkan !');
                document.location.href = 'acara.php';
             </script>";
        } else {
            echo "<script>
                alert('Data Acara Gagal Ditambahkan !');
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
                        <h1 class="m-0"> <i class="fas fa-plus"></i> Tambah Data Acara</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- <div class="note" style="border: 0.5px solid; border-radius: 7px; margin-left: 555px; margin-right: 200px; height: 780px;">
                    <h4 style="position: relative; left: 20px;"> <b>Note :</b> </h4>
                </div> -->

                <form action="" method="post" enctype="multipart/form-data" style="width: 50%; margin-left: 40px; min-height:900px">

                    <div class="mb-3">
                        <label for="nama_acara" class="form-label">Nama Acara</label>
                        <input type="text" class="form-control" id="nama_acara" name="nama_acara" placeholder="Nama Acara ..." required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_acara" class="form-label">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control" id="tgl_acara" name="tgl_acara" placeholder="Tanggal Pelaksaan Acara ..." required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="tempat_acara" class="form-label">Tempat Acara</label>
                        <input type="text" class="form-control" id="tempat_acara" name="tempat_acara" placeholder="Tempat Acara ..." required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="gambar_acara" class="form-label">Gambar Acara</label>
                        <input type="file" class="form-control" id="gambar_acara" name="gambar_acara" onchange="previewImg()">

                        <img src="" alt="" class="img-thumbnail img-preview mt-2" width="300px">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Acara ..." autocomplete="off">
                    </div>


                    <a href="acara.php" class="btn btn-danger" style="float: right;">Cancel</a>
                    <button type="submit" name="tambah" class="btn btn-primary mb-3" style="float: right; margin-right: 10px;">Tambah</button>
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