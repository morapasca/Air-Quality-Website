<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'db_spkku') or die ('Gagal terhubung ke database'); 


// function query($query)
// {
//     // Koneksi database
//     global $koneksi;

//     $result = mysqli_query($koneksi, $query);

//     // membuat varibale array
//     $rows = [];

//     // mengambil semua data dalam bentuk array
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }

//     return $rows;
// }

?>