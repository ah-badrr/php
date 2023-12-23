<?php
require "../config.php";

$query = "SELECT kategori.kategori, pengajar.nama, mata_kuliah.* FROM mata_kuliah 
INNER JOIN kategori ON mata_kuliah.kategori_id = kategori.id 
INNER JOIN pengajar ON mata_kuliah.pengajar_id = pengajar.id LIMIT 3";
$mata_kuliah = mysqli_query($connect, $query);
$matkul = mysqli_fetch_assoc($mata_kuliah);
// if (isset($_GET['search']) or isset($_GET['cari'])) {
//     $search = $_GET['search'];
//     $cari = "SELECT * FROM pengajar 
//     WHERE nama LIKE '%$search%'
//     OR gender LIKE '%$search%'
//     OR alamat LIKE '%$search%' ";
// 
//     $pengajar = mysqli_query($connect, $cari);
// 
//     if (mysqli_num_rows($pengajar) == 0) {
//         $error = true;
//     }
// }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pijar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735fc517fe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "nav.html";
    ?>
    <div class="row m-0 mb-5 text-center align-content-center hero" style="height: 55vh !important;">
        <h1 class="fw-bold">E-learning PeTIK</h1>
        <p>Platform pembelajaran online Pesantren PeTIK</p>
        <a href="">
            <button class="btn btn-outline-success">Ready to get started ?</button>
        </a>
    </div>

    <div class="container pt-1 pb-5 mb-5">

        <?php
        foreach ($kategori as $k) { ?>
            <h4 class="mt-5 fw-bold mb-5">Mata Kuliah <?= $k['kategori'] ?><a href="show.php?id=<?= $k['id'] ?>" class="text-decoration-none text-black fw-bold fs-6 float-end"><i class="fa fa-list"></i> Lihat Semua</a></h4>


            <div class="row row-cols-md-3 g-4 pb-5">
                <?php
                $kid = $k['id'];
                $query = "SELECT  pengajar.nama, mata_kuliah.* FROM mata_kuliah 
INNER JOIN pengajar ON mata_kuliah.pengajar_id = pengajar.id WHERE mata_kuliah.kategori_id = $kid LIMIT 3";
                $mata_kuliah = mysqli_query($connect, $query);
                foreach ($mata_kuliah as $mk) {
                ?>
                    <div class="col">
                        <div class="card">
                            <img src="../img/photo_2023-12-22_09-45-43.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-text text-muted">Dosen : <span class="text-info fw-light"><?= $mk['nama'] ?></span></div>
                                <div class="card-title mt-2 fw-bold">
                                    <a class="text-decoration-none text-black" href="detail_matkul.php?id=<?= $mk['id'] ?>">
                                        <h5><?= $mk['nama_matkul'] ?></h5>
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-text text-dark text-opacity-75 fw-light pt-1 pb-1">
                                    <i class="fa fa-user"></i> <?= $mk['jumlah_peserta'] ?> Peserta
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  }
                // }
                ?>
            </div>
        <?php }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>