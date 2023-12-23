<?php
require "../config.php";
$id = $_GET["id"];
$query = "SELECT kategori.kategori, pengajar.nama, mata_kuliah.* FROM mata_kuliah INNER JOIN kategori ON mata_kuliah.kategori_id = kategori.id INNER JOIN pengajar ON mata_kuliah.pengajar_id = pengajar.id WHERE mata_kuliah.id = '$id'";
$detail = mysqli_query($connect, "$query");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pijar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735fc517fe.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <?php
                foreach ($detail as $d) {
                ?>
                    <div class="card mt-4">
                        <div class="card-header text-light bg-info">
                            <a href="index.php" class="btn btn-warning btn-sm float-end">
                                <i class="fa fa-arrow-left"></i> Back </a>
                            <h3 class="m-0 fw-bold">Detail Data Mata Kuliah</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-text">Kode : <?= $d['kode'] ?></div>
                            <hr>
                            <div class="card-text">Nama : <?= $d['nama_matkul'] ?></div>
                            <hr>
                            <div class="card-text">Jumlah Peserta : <?= $d['jumlah_peserta'] ?> peserta</div>
                            <hr>
                            <div class="card-text">Kategori : <?= $d['kategori'] ?></div>
                            <hr>
                            <div class="card-text">Pengajar : <?= $d['nama'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>