<?php
require "../config.php";
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
                <div class="card mt-4">
                    <div class="card-header text-light bg-primary">
                        <a href="index.php" class="btn btn-warning btn-sm float-end">
                            <i class="fa fa-arrow-left"></i> Back </a>
                        <h3 class="m-0 fw-bold">Tambah Data Pengajar</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="tagInput" class="form-label">Nama</label>
                                <input required name="nama" type="text" class="form-control" id="tagInput">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" value="l" type="radio" name="gender" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki - laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="p" type="radio" name="gender" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="a" class="form-label">Alamat</label>
                                <input required name="alamat" type="text" class="form-control" id="a">
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>

<?php
// tangkap kiriman data dari user
$nama = htmlspecialchars($_POST['nama']);
$gender = $_POST['gender'];
$alamat = htmlspecialchars($_POST['alamat']);
$insert = "INSERT INTO pengajar (nama, gender, alamat) VALUES ('$nama','$gender','$alamat')";

if (isset($_POST["simpan"])) {

    mysqli_query($connect, "$insert");
    session_start();
    $_SESSION['created'] = "Selamat...";
    header("location:index.php");
};
?>