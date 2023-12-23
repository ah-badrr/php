<?php
require "../config.php";
$id = $_GET["id"];
$query = "SELECT * FROM mata_kuliah WHERE id = $id";
$edit = mysqli_query($connect, "$query");
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
                        <h3 class="m-0 fw-bold">Edit Data Mata Kuliah</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($edit as $e) {
                        ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <input value="<?= $e['id'] ?>" required name="id" type="hidden" class="form-control" id="kodeInput" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="k" class="form-label">Kode</label>
                                    <input value="<?= $e['kode'] ?>" required name="kode" type="text" class="form-control" id="k">
                                </div>
                                <div class="mb-3">
                                    <label for="n" class="form-label">Nama</label>
                                    <input value="<?= $e['nama_matkul'] ?>" required name="nama" type="text" class="form-control" id="n">
                                </div>
                                <div class="mb-3">
                                    <label for="n" class="form-label">Jumlah Peserta</label>
                                    <input value="<?= $e['jumlah_peserta'] ?>" required name="peserta" type="number" class="form-control" id="n">
                                </div>
                                <div class="mb-3">
                                    <label for="kg" class="form-label">Kategori</label>
                                    <select required name="kategori_id" type="number" class="form-select" id="kg">
                                        <?php
                                        foreach ($kategori as $k) { ?>
                                            <option value="<?= $k['id'] ?>" <?= $k['id'] == $e['kategori_id'] ? "selected" : "" ?>><?= $k['kategori'] ?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="p" class="form-label">Pengajar</label>
                                    <select required name="pengajar_id" type="number" class="form-select" id="p">
                                        <?php
                                        foreach ($pengajar as $p) { ?>
                                            <option value="<?= $p['id'] ?>" <?= $p['id'] == $e['pengajar_id'] ? "selected" : "" ?>><?= $p['nama'] ?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["edit"])) {
        $idd = $_POST['id'];
        $kode = htmlspecialchars($_POST['kode']);
        $nama = htmlspecialchars($_POST['nama']);
        $peserta = htmlspecialchars($_POST['peserta']);
        $kategori_id = htmlspecialchars($_POST['kategori_id']);
        $pengajar_id = htmlspecialchars($_POST['pengajar_id']);
        $query = "UPDATE mata_kuliah SET kode = '$kode', nama_matkul = '$nama', jumlah_peserta = $peserta ,kategori_id = $kategori_id, pengajar_id = $pengajar_id WHERE id = '$id' ";

        mysqli_query($connect, "$query");
        session_start();
        $_SESSION['updated'] = "Selamat...";
        header("location:index.php");
    };
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>