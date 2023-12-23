<?php 
require "config.php";

// ambil data (fetch) dari object result
// mysqli_fetch_row() // mengembalikan array numeric
// mysqli_fetch_assoc() // mengembalikan array associatif
// mysqli_fetch_array() // mengembalikan keduanya => kekurangan : data yang disajikan double
// mysqli_fetch_object()

// while ($kry = mysqli_fetch_assoc($result)) {
// echo $kry . " - ";
// };

// menampilkan semua data dengan foreach
// while ($kry = mysqli_fetch_assoc($result)) {
//     foreach ($kry as $k) {
//         echo $k . " - ";
//     };
//     echo "<br>";
// };

// menampilkan semua data dengan looping for
// while ($kry = mysqli_fetch_row($result)) {
//     for ($i = 0; $i < count($kry); $i++) {
//         echo $kry[$i] . " - ";
//     }
//     echo "<br>";
// };

?>