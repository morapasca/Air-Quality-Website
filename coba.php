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
               
                <form action="" method="post" enctype="multipart/form-data">
                    
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
                
                    $testing= array($_POST['pm10'], $_POST['so2'], $_POST['co'], $_POST['o3'], $_POST['no2']);
                    
                }
                ?>
                </div>
                <div class="col-lg-6 col-md-12 text-center text-white">
                    <h4 class="my-5">Kategori Kualitas Udara adalah <?php $testing ?> </h4>

                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

   

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