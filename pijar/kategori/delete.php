<?php
require "../config.php";
$id = $_GET["id"];

// query delete
$delete = "DELETE FROM kategori WHERE id = '$id' ";

// simpan data pada database
// delete data didalam database
mysqli_query($connect, "$delete");
session_start();
$_SESSION['deleted'] = "Selamat...";
// Redirect ke index.php
header("location:index.php");
