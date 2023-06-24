<?php
    include 'onek.php';
    require_once 'nav.php';
    // if (isset($_GET['id']=='hapus' && $_GET['nama'])) {
    //  echo "dihapus.";
    // }
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Sub Kriteria</h1>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" required name="kriteria" class="form-control" placeholder="NAMA KRITERIA">
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="bobot" class="form-control" placeholder="SUB KRITERIA">
                                </div>
                                 <div class="form-group">
                                    <input type="text" required name="bobot" class="form-control" placeholder="BOBOT SUB KRITERIA">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="form-control btn btn-warning form-control" value="submit" placeholder="submit">
                                </div>
                            </form>

                            <!-- insert sub -->
                                <?php
                                if (isset($_POST['submit'])) {
                                    $kriteria   = $_POST['kriteria'];
                                    $subkriteria   = $_POST['subkriteria'];
                                    $bobot_subkriteria = $_POST['bobot_subkriteria'];
                                    // var_dump($nama,$nik,$kelamin,$ttl,$alamat);
                                    // die;

                                    //sql insert to kriteria
                                    $sql = "INSERT INTO kriteria (subkriteria,bobot_subkriteria)VALUES ('$subkriteria','$bobot_subkriteria')";
                                    $query = mysqli_query($dbcon,$sql);
                                    if ($query) {
                                        echo "<script>alert('berhasil memasukkan data Subkriteria')</script>";
                                    }else{
                                        echo "<script>alert('Gagal Memasukkan data')</script>";

                                    }
                                    
                                }else{
                                   
                                }
                                ?>
                            <!-- end kriteria -->

                        </div>
                        
                        <!-- Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Kriteria
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Bobot Subkriteria</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Tabel Data -->

                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

<?php 
    require_once 'foot.php';
 ?>