<?php
require "../config.php";
$id = $_GET['id'];
$query = "SELECT kategori.kategori, pengajar.nama, mata_kuliah.* FROM mata_kuliah 
INNER JOIN kategori ON mata_kuliah.kategori_id = kategori.id 
INNER JOIN pengajar ON mata_kuliah.pengajar_id = pengajar.id WHERE kategori_id = $id";
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

    <div class="container pb-5 mb-5">

        <div class="row mt-5 gray p-3 rounded-2">
            <nav aria-label="breadcrumb border">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="#">My Course</a></li>
                    <li class="breadcrumb-item active text-success" aria-current="page"><?= $matkul['kategori'] ?></li>
                </ol>
            </nav>
        </div>

        <h6 class="mt-5 fw-normal mb-5">Total <?= mysqli_num_rows($mata_kuliah) ?> mata kuliah <?= $k['kategori'] ?></h6>
        <div class="row row-cols-md-3 g-4">
            <?php
            foreach ($mata_kuliah as $mk) { ?>

                <div class="col mb-3">
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
            <?php }
            ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>