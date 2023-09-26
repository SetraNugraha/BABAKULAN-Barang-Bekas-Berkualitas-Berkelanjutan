<?php
session_start();
$tittle = 'Data Acara BABAKULAN';
include 'layout/header.php';

// membatasi halaman sebelum login
if (isset($_SESSION['username'])) {

    $data_acara = select("SELECT * FROM acara ORDER BY id_acara DESC");
?>

    <!-- Content Wrapper. Contains page content -->

    <script src="assets-template/plugins/jquery/jquery.min.js"></script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Acara</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Tabel Data Acara BABAKULAN</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <a href="tambah-acara.php" class="btn btn-primary btn-small mb-2"> <i class="fas fa-plus"></i> Tambah</a>
                                        <table id="dataTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Acara</th>
                                                    <th>Tanggal Pelaksanaan</th>
                                                    <th>Tempat</th>
                                                    <th>Gambar</th>
                                                    <th>Deskripsi</th>                                                
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php $no = 1; ?>
                                                <?php foreach ($data_acara as $result_acara) : ?>
                                                    <tr>
                                                        <td> <?= $no++; ?> </td>
                                                        <td> <?= $result_acara['nama_acara']; ?> </td>
                                                        <td><?= date('d-m-Y', strtotime($result_acara['tgl_acara'])); ?></td>
                                                        <td><?= $result_acara['tempat_acara']; ?></td>
                                                        <td><a href="assets/img/gambar_acara/<?= $result_acara['gambar_acara']; ?>">
                                                                <img src="assets/img/gambar_acara/<?= $result_acara['gambar_acara']; ?>" width="100px" height="100px" alt="gambar_acara">
                                                            </a></td>
                                                        <td><?= $result_acara['deskripsi']; ?></td>
                                                        
                                                        <td width="15%" class="text-center">
                                                            <a href="edit-acara.php?id_acara=<?= $result_acara['id_acara']; ?>" class="btn btn-warning" style="color: white;"><i class="fas fa-edit" style="margin-right: 3px;"></i>Edit</a>
                                                            <a href="hapus-acara.php?id_acara=<?= $result_acara['id_acara']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin mengahapus data acara ini ?')"><i class="fas fa-trash-alt" style="margin-right: 3px;"></i>Hapus</a>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>


<?php

} else {
    header("Location: login-template.php");
    exit();
}

include 'layout/footer.php';

?>