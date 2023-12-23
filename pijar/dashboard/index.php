<?php
require "../config.php"; ?>

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
        <div class="card border-0 shadow text-light mt-5 bg-primary">
            <h1 class="fa-5x card-header fw-bold p-5">Pijar</h1>
            <div class="card-body bg-info bg-opacity-75 ps-5 pe-5">
                <span class="float-end card-text text-end">Copyright by Ahmad &copy;2023</span>
                <h4 class="m-0">Dashboard</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 col-lg-3">
                <ul class="shadow list-group">
                    <li class="list-group-item active">
                        <h5 class="m-0">Main Menu</h5>
                    </li>
                    <li class="list-group-item bg-info bg-opacity-25 "><a class="text-dark text-decoration-none" href="../dashboard/index.php">Dashboard</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../kategori/index.php">Manage Kategori</a></< /li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../pengajar/index.php">Manage Pengajar</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../mata_kuliah/index.php">Manage Mata_kuliah</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="../soal/index.php">Manage Soal</a></li>
                </ul>
            </div>
            <div class="col-md-12 col-lg-9">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane shadow border border-top-0 bg-light p-4 active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col">
                                <div class="card bg-primary text-light text-center">
                                    <div class="card-header text-center">
                                        <h1 class="fa-8x card-title"><?= mysqli_num_rows($kategori) ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-text">Kategori</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-success text-light text-center">
                                    <div class="card-header">
                                        <h1 class="fa-8x card-title"><?= mysqli_num_rows($mata_kuliah) ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-text">Mata Kuliah</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-info text-light text-center">
                                    <div class="card-header">
                                        <h1 class="fa-8x card-title"><?= mysqli_num_rows($pengajar) ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-text">Pengajar</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-warning text-light  text-center">
                                    <div class="card-header">
                                        <h1 class="fa-8x card-title"><?= mysqli_num_rows($soal) ?></h1>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-text">Soal</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane shadow border border-top-0 bg-light p-4 " id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">Profile</div>
                    <div class="tab-pane shadow border border-top-0 bg-light p-4 " id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">Messages</div>
                    <div class="tab-pane shadow border border-top-0 bg-light p-4 " id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">Settings</div>
                </div>

            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>