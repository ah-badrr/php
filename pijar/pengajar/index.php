<?php
require "../config.php";

if (isset($_GET['search']) or isset($_GET['cari'])) {
    $search = $_GET['search'];
    $cari = "SELECT * FROM pengajar 
    WHERE nama LIKE '%$search%'
    OR gender LIKE '%$search%'
    OR alamat LIKE '%$search%' ";

    $pengajar = mysqli_query($connect, $cari);

    // cek kalau data pencarian tidak ditemukan
    if (mysqli_num_rows($pengajar) == 0) {
        $error = true;
    }
}

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
    <div class="container pb-5">
        <div class="card shadow  border-0 mt-5 text-light bg-primary">
            <h1 class="fa-5x card-header fw-bold p-5">Pijar</h1>
            <div class="card-body bg-info bg-opacity-75 ps-5 pe-5">
                <?php
                session_start();
                if (isset($_SESSION['created'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $_SESSION['created'] ?></strong> Data berhasil dibuat!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    session_destroy();
                } else if (isset($_SESSION['deleted'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $_SESSION['deleted'] ?></strong> Data berhasil dihapus!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    session_destroy();
                } else if (isset($_SESSION['updated'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $_SESSION['updated'] ?></strong> Data berhasil diupdate!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    session_destroy();
                }
                ?>
                <span class="float-end card-text text-end">Copyright by Ahmad &copy;2023</span>
                <h4 class="m-0">Data Pengajar</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 col-lg-3">
                <ul class="list-group">
                    <li class="shadow list-group-item active">
                        <h5 class="m-0">Main Menu</h5>
                    </li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../dashboard/index.php">Dashboard</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../kategori/index.php">Manage Kategori</a></< /li>
                    <li class="list-group-item bg-info bg-opacity-25 "><a class="text-dark text-decoration-none" href="../pengajar/index.php">Manage Pengajar</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../mata_kuliah/index.php">Manage Mata_kuliah</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../soal/index.php">Manage Soal</a></li>
                </ul>
            </div>
            <div class="col-md-12 col-lg-9">
                <form method="GET" class="row float-end row-cols-lg-auto g-2 align-items-center">
                    <div class="col-12">
                        <div class="form-check">
                            <input type="text" name="search" placeholder="mau cari apa?" class="shadow form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="cari" class="shadow btn btn-success">
                            <i class="fa fa-search"></i> Cari</button>
                    </div>
                </form>
                <a href="tambah.php">
                    <button class="btn shadow   btn-primary">
                        <i class="fa fa-plus-circle"></i> Tambah Data
                    </button>
                </a>
                <div class="shadow table">
                    <table class="table table-bordered table-striped-columns mt-4">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Alamat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $id = 1;
                            foreach ($pengajar as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $id++ ?></th>
                                    <td><?= $data["nama"] ?></td>
                                    <td><?= $data["gender"] == 'p' ? "Perempuan" : "Laki-laki" ?></td>
                                    <td><?= $data["alamat"] ?></td>
                                    <td>
                                        <a class="text-decoration-none" href="detail.php?id=<?= $data['id'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="detail"> <i class="fa fa-eye"></i></button>
                                        </a>
                                        <a class="text-decoration-none" href="edit.php?id=<?= $data['id'] ?>">
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="edit"> <i class="fa fa-pencil"></i></button>
                                        </a>
                                        <a class="text-decoration-none" href="delete.php?id=<?= $data['id'] ?>">
                                            <button type="button" onclick="return confirm('Apakah anda yakin data ini akan dihapus')" name="hapus" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="hapus"><i class="fa fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                            <?php
                            if ($error == true) {
                                echo "<tr><td colspan='5' class='text-center'>data tidak ditemukan<td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>