<!-- include php -->
<?php
include 'koneksi.php';
include 'header.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Phpml\Dataset\ArrayDataset;
use Phpml\Classification\KNearestNeighbors;
?>
<!-- akhir include php -->

    <!-- Start Breadcrumbs -->
    <div class="hitungdata breadcrumbs">
        <div class="container">            
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="page-title">Hitung Data</h3>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12">
                <?php
                if(isset($_POST['submit'])){
                    $tanggal			= $_POST['tanggal'];
                    $pm10			    = $_POST['pm10'];
                    $so2	            = $_POST['so2'];
                    $co		            = $_POST['co'];
                    $o3		            = $_POST['o3'];
                    $no2		        = $_POST['no2'];

                    
                        $sql = mysqli_query($koneksi, "INSERT INTO hasilhitung (tanggal,pm10,so2,co,o3,no2) VALUES('$tanggal', $pm10, $so2, $co, $o3, $no2)") or die(mysqli_error($koneksi));

                        if($sql){
                            echo '<script>alert("Berhasil menambahkan data."); </script>';
                        }else{
                            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                        }
                   
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" max="01-01-2006" required>
                    </div>
                    <div class="mb-3">
                        <label for="pm10" class="form-label">ISPU PM&#8321;&#8320;</label>
                        <input type="number" class="form-control" id="pm10" placeholder="Masukkan ISPU PM&#8321;&#8320;" min="1" name="pm10" autocomplete="off" required>
                    </div>    
                    <div class="mb-3">
                        <label for="so2" class="form-label">ISPU SO&#8322;</label>
                        <input type="number" class="form-control" id="so2" placeholder="Masukkan ISPU SO&#8322;" min="1" name="so2" autocomplete="off" required>
                    </div>   
                    <div class="mb-3">
                        <label for="co" class="form-label">ISPU CO</label>
                        <input type="number" class="form-control" id="co" placeholder="Masukkan ISPU CO" min="1" name="co" autocomplete="off" required>
                    </div> 
                    <div class="mb-3">
                        <label for="o3" class="form-label">ISPU O&#8323;</label>
                        <input type="number" class="form-control" id="o3" placeholder="Masukkan ISPU O&#8323;" min="1" name="o3" autocomplete="off" required>
                    </div> 
                    <div class="mb-3">
                        <label for="no2" class="form-label">ISPU NO&#8322;</label>
                        <input type="number" class="form-control" id="no2" placeholder="Masukkan ISPU NO&#8322;" min="1" name="no2" autocomplete="off" required>
                    </div>               
                    <hr>
                    <a href="data.php" class="btn btn-warning">Hitung Ulang</a>                    
                    <button type="submit" class="btn btn-primary" name="submit">Hitung</button>
                </form>
                <?php 
                if(isset($_POST['submit'])){   

                    $sql= mysqli_query($koneksi, "SELECT * FROM dataset ORDER BY id_dataset") or die(mysqli_error($koneksi));
                    
                    $arr_atribut=array();
                    $arr_label=array();
                    while ($row=$sql->fetch_row()){
                        array_push($arr_atribut, array_slice($row,2,count($row)-1));
                        array_push($arr_label, $row [count($row)-1]);
                    }
                    $dataset=new ArrayDataset(
                        $arr_atribut, $arr_label
                    );
                    $samples = $dataset->getSamples();
                    $targets = $dataset->getTargets();
                
                    $testing= array($_POST['pm10'], $_POST['so2'], $_POST['co'], $_POST['o3'], $_POST['no2']);
                
                    $classifier = new KNearestNeighbors($k=5);
                    $classifier->train($samples, $targets);
                    $hasil = $classifier->predict($testing);

                    echo "<div class='col-lg-6 col-md-12 text-center text-white'><h4 class='my-5'>Kategori Kualitas Udara adalah $hasil </h4></div>";
                    
                }
                ?>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="hasilhitung breadcrumbs">
        <div class="container">
            <h4 class="mb-3">Riwayat Hitung</h4>
            <table class="table table-hover table-responsive display responsive nowrap wow fadeInUp" style="width:100%" id="riwayathitung" data-wow-delay="1s">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th>Tanggal</th>
                    <th>PM&#8321;&#8320;</th>
                    <th>SO&#8322;</th>
                    <th>CO</th>
                    <th>O&#8323;</th>
                    <th>NO&#8322;</th>
                    <th>Kategori</th> 
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
            <?php
            //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
            $sql = mysqli_query($koneksi, "SELECT * FROM hasilhitung ORDER BY id_hasilhitung") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
                    //menampilkan data perulangan
                    echo '
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$data['tanggal'].'</td>
                        <td>'.$data['pm10'].'</td>
                        <td>'.$data['so2'].'</td>
                        <td>'.$data['co'].'</td>
                        <td>'.$data['o3'].'</td>
                        <td>'.$data['no2'].'</td>
                        <td>'.$data['kategori'].'</td>
                        <td>
                            <a href="index.php?page=edit_mhs&Nim='.$data['id_hasilhitung'].'" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete.php?Nim='.$data['id_hasilhitung'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                        </td>
                    </tr>
                    ';
                    $no++;
                }
            //jika query menghasilkan nilai 0
            }else{
                echo '
                <tr>
                    <td colspan="6">Tidak ada data.</td>
                </tr>
                ';
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- akhir footer -->
<script type="text/javascript">
    $(document).ready( function () {
    $('#riwayathitung').DataTable();
    } );
</script>
</body>

</html>