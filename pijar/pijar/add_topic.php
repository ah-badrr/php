<?php
require "../config.php";
$id = $_GET['id'];
$query = "SELECT * FROM mata_kuliah WHERE id = $id";
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

    <div class="container">

        <div class="row mt-5 gray p-3 rounded-2">
            <?php
            session_start();
            if (isset($_SESSION['created'])) { ?>
                <p>dfdsf</p>
                <script>
                    swal("Good job!", "You clicked the button!", "success");
                </script>
            <?php
                session_destroy();
            } ?>
            <h5 class="m-0 col-4"><?= $matkul['nama_matkul'] ?></h5>
            <div class="col">
                <nav aria-label="breadcrumb border">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a class="text-decoration-none fw-light text-black" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none fw-light text-black" href="#">My Course</a></li>
                        <li class="breadcrumb-item"><a class="text-decoration-none fw-light text-black" href="detail_matkul.php?id=<?= $id ?>"><?= $matkul['kode'] ?></a></li>
                        <li class="breadcrumb-item" aria-current="page">Adding a new</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mt-5 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mt-3 mb-4">
                        <h5>Adding a new topic</h5>
                    </div>
                    <form method="POST">
                        <div class="row row-cols-md-2">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="mk">Mata Kuliah</label>
                                    <input value="<?= $matkul["nama_matkul"] ?>" readonly type="text" class="form-control gr" id="mk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="ns">Nama Soal</label>
                                    <input name="nm_soal" type="text" required class="form-control" id="ns">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="tm">Tanggal Mulai</label>
                                    <input name="dt_mulai" type="date" required class="form-control" id="tm">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="ts">Tanggal Selesai</label>
                                    <input name="dt_selesai" type="date" required class="form-control" id="ts">
                                </div>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Jenis Soal</label>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio" value="t" name="jenis" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Tugas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio" value="k" name="jenis" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Kuis
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio" value="u" name="jenis" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Ujian
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 mt-4 p-0">
                                <button type="submit" name="simpan" class="btn btn-success text-light">Save and return to course</button>
                                <a href="detail_matkul.php?id=<?= $id ?>">
                                    <p class="float-end btn btn-outline-success">Cancel</p>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    $nm_soal = htmlspecialchars($_POST['nm_soal']);
    $dt_mulai = $_POST['dt_mulai'];
    $dt_selesai = $_POST['dt_selesai'];
    $jenis = $_POST['jenis'];
    $insert = "INSERT INTO soal (nama_soal, tgl_mulai, tgl_selesai, jenis_soal, matkul_id) VALUES ('$nm_soal', '$dt_mulai', '$dt_selesai', '$jenis', '$id')";
    $id = $_GET['id'];
    if (isset($_POST['simpan'])) {
        mysqli_query($connect, "$insert");
        session_start();
        $_SESSION['created'] = ""; ?>

        <script type='text/javascript'>
            document.location.href = 'detail_matkul.php?id=<?= $id ?>';
        </script>
    <?php
        // header("location:detail_matkul.php?id=$id?");
    } 
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>