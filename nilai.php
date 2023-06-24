<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Nilai Pelamar</h1>
                            <a href="kriteria.php">tentukan kriteria dahulu</a>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <input required type="text" name="nik" class="form-control" placeholder="NIK">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nama" class="form-control" placeholder="NAMA PELAMAR">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nilaiadm" class="form-control" placeholder="NILAI TES ADMINISTRASI">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nilaitls" class="form-control" placeholder="NILAI TES TULIS">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nilaiww" class="form-control" placeholder="NILAI TES WAWANCARA">
                                </div>  
                                <div class="form-group">
                                    <input type="submit" name="submit" class=" btn btn-warning form-control" value="submit" placeholder="submit">
                                </div>
                            </form>

                            <?php
                                if (isset($_POST['submit'])) {
                                    $nik    = $_POST['nik'];
                                    $nama    = $_POST['nama'];
                                    $nilaiadm= $_POST['nilaiadm'];
                                    $nilaitls= $_POST['nilaitls'];
                                    $nilaiww = $_POST['nilaiww'];
                                    // var_dump($nama,$nik,$kelamin,$ttl,$alamat);
                                    // die;
                                    $sqlceknilai = "SELECT * FROM penilaian WHERE nik=$nik";
                                    $sqlcek  = "SELECT * FROM siswa WHERE nik=$nik ";
                                    $cekquery= mysqli_query($dbcon,$sqlcek);
                                    
                                    if (mysqli_num_rows($cekquery) < 1) {
                                        echo "<script>alert('data siswa tidak ditemukan')</script>";
                                    }else{
                                        if (mysqli_num_rows(mysqli_query($dbcon,$sqlceknilai)) < 1 ) {
                                             $sql = "INSERT INTO penilaian (nik,na,nt,nw)VALUES ('$nik','$nilaiadm','$nilaitls','$nilaiww')";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query) {
                                                echo "<script>alert('berhasil memasukkan data penilaian')</script>";
                                            }else{
                                                echo "<script>alert('Gagal Memasukkan data')</script>";
                                            }
                                        }else{
                                                echo "<script>alert('Duplikasi Data dengan NIK tersebut')</script>";

                                        }
                                    }                                        
                                }
                            ?>
                        </div>


                         <!-- Menampilkan Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Alternatif
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIK</th>
                                                    <th>Nama Pelamar</th>
                                                    <th>Nilai Tes Administrasi</th>
                                                    <th>Nilai Tes Tulis</th>
                                                    <th>Nilai Tes Wawancara</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM penilaian";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;



                                                   while ($siswa=mysqli_fetch_array($query)) {
                                                        $nik = $siswa['nik'];
                                                        $sqlnama = "SELECT nama FROM siswa WHERE nik = $nik";
                                                        $namasiswa = mysqli_fetch_array(mysqli_query($dbcon,$sqlnama));
                                                        
                                                ?>
                                                        <tr>
                                                            <td><?=$n?></td>
                                                            <td><?=$siswa['nik']?></td>
                                                            <td><?=$namasiswa['nama']?></td>
                                                            <td class="text-right"><?=$siswa['na']?></td>
                                                            <td class="text-right"><?=$siswa['nt']?></td>
                                                            <td class="text-right"><?=$siswa['nw']?></td>
                                                            <td><a href="aksi/hapusna.php?name=<?=$siswa['id_penilaian'];?>">hapus</a> | <a href="">edit</a></td>
                                                        </tr>
                                                <?php
                                                    $n++;
                                                    }
                                                ?>
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