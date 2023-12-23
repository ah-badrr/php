<?php
// koneksi ke database
$host = "localhost";
$user = "root";
$connect = mysqli_connect($host, $user, 'bismillah', 'pijar');
$kategori = mysqli_query($connect, "SELECT * FROM kategori");
$mata_kuliah = mysqli_query($connect, "SELECT * FROM mata_kuliah");
$soal = mysqli_query($connect, "SELECT * FROM soal");
$pengajar = mysqli_query($connect, "SELECT * FROM pengajar");
