<?php
require "../config.php";
$id = $_GET['id'];
$query = "SELECT kategori.kategori, mata_kuliah.* FROM mata_kuliah 
INNER JOIN kategori ON mata_kuliah.kategori_id = kategori.id WHERE mata_kuliah.id = $id";
$mata_kuliah = mysqli_query($connect, $query);
$matkul = mysqli_fetch_assoc($mata_kuliah);
// echo $id;
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    include "nav.html";
    ?>
    <div class="container pb-5 mb-5">
        <div class="row mt-5 p-0">
            <?php
            session_start();
            if (isset($_SESSION['created'])) { ?>
                <script>
                    swal("Successfull", "Data has been added", "success");
                </script>
            <?php
                session_destroy();
            } else if (isset($_SESSION['deleted'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['deleted'] ?></strong> Data berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                session_destroy();
            }
            ?>
        </div>
        <div class="row mt-2 gray p-3 rounded-2">
            <nav aria-label="breadcrumb border">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href="#">My Course</a></li>
                    <li class="breadcrumb-item active text-success" aria-current="page"><?= $matkul['kode'] ?></li>
                </ol>
            </nav>
        </div>

        <div class="row mt-4 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mt-3 mb-4">
                        <span class="float-end fw-light">Category : Mata Kuliah <?= $matkul['kategori'] ?></span>
                        <h5>Course Content</h5>
                    </div>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <?php
                        $query = "SELECT DAY(tgl_selesai) - DAY(tgl_mulai) AS days, soal.* FROM soal WHERE matkul_id = $id";
                        $soal = mysqli_query($connect, $query);
                        foreach ($soal as $s) {
                            $sid = $s['id'];
                        ?>
                            <div class="accordion-item mt-3 border rounded-2">
                                <h2 class="accordion-header rounded-2" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button collapsed rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $s['jenis_soal'] . $s['matkul_id'] . $s['id'] ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                        <?= $s['nama_soal'] ?>
                                    </button>
                                </h2>
                                <div id="<?= $s['jenis_soal'] . $s['matkul_id'] . $s['id'] ?>" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <form method="POST">
                                            <button type="submit" value="<?= $s['id'] ?>" name="delete" class="btn btn-outline-danger float-end" onclick="return confirm('Apakah anda yakin data ini akan dihapus')"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <p class="mb-2">
                                            <small>Kategori
                                                <?php if ($s['jenis_soal'] == 't') { ?>
                                                    <span class="badge bg-success">tugas</span>
                                                <?php } else if ($s['jenis_soal'] == 'k') { ?>
                                                    <span class="badge bg-warning">kuis</span>
                                                <?php } else if ($s['jenis_soal'] == 'u') { ?>
                                                    <span class="badge bg-danger">ujian</span>
                                                <?php } ?>
                                            </small>
                                        </p>
                                        <p class="mb-2">- Dateline
                                            <span class="text-danger fw-bold">
                                                <small>
                                                    <?= $s['days'] ?> hari lagi
                                                </small>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col mt-4 p-0">
                <a href="add_topic.php?id=<?= $id ?>">
                    <button class="btn btn-info text-light"><i class="fa fa-plus-circle"></i>Add Topic</button>
                </a>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['delete'])) {
        $del = $_POST['delete'];
        $delete = "DELETE FROM soal WHERE id = '$del' ";
        mysqli_query($connect, "$delete");
        session_start();
        $_SESSION['deleted'] = "Selamat...";
        echo "<script type='text/javascript'>document.location.href = 'detail_matkul.php?id=$id';</script>";
    }
    ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>