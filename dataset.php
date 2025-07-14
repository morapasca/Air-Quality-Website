<!-- include php -->
<?php
include 'koneksi.php';
include 'header.php';
?>
<!-- akhir include php -->

    <!-- Start Breadcrumbs -->
    <div class="hitungdata breadcrumbs">
        <div class="container">            
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="page-title">Dataset</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="hasilhitung container">
        <div class="d-block">
            <h4 class="mb-3">Dataset</h4>
            <table class="table table-hover table-responsive display responsive nowrap wow fadeInUp" style="width:100%" id="dataset" data-wow-delay="1s">
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
            $sql = mysqli_query($koneksi, "SELECT * FROM dataset ORDER BY id_dataset") or die(mysqli_error($koneksi));
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
                            <a href="index.php?page=edit_mhs&Nim='.$data['id_dataset'].'" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete.php?Nim='.$data['id_dataset'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
    $('#dataset').DataTable();
    } );
</script>
</body>

</html>