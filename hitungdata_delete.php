<?php
//include file config.php
include('koneksi.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id_hasilhitung'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id_hasilhitung'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM hasilhitung WHERE id_hasilhitung='$id'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM hasilhitung WHERE id_hasilhitung='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="hitungdata.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="hitungdata.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="hitungdata.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="hitungdata.php";</script>';
}

?>
