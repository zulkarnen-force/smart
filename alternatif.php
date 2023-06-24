<?php
    include './onek.php';
    require_once 'nav.php';
    // if (isset($_GET['id']=='hapus' && $_GET['name'])) {
    //  echo "dihapus.";
    // }
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Alternatif</h1>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" required name="nik" class="form-control" placeholder="NIK">
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="nama" class="form-control" placeholder="Nama Pelamar">
                                </div>
                                <div class="form-group">
                                    <select name="kelamin" required class="form-control">
                                        <option disabled selected>Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group"> 
                                    <input type="date" required name="ttl" class="form-control" placeholder="ttl">
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="alamat" class="form-control" placeholder="alamat">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="form-control btn btn-warning form-control" value="submit" placeholder="submit">
                                </div>
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $nik   = $_POST['nik'];
                                    $nama   = $_POST['nama'];
                                    $kelamin= $_POST['kelamin'];
                                    $ttl = $_POST['ttl'];
                                    $alamat= $_POST['alamat'];
                                    // var_dump($nama,$nik,$kelamin,$ttl,$alamat);
                                    // die;

                                    //sql insert to alternatif
                                    $sql = "INSERT INTO alternatif (nik,nama,kelamin,ttl,alamat)VALUES ('$nik','$nama','$kelamin','$ttl','$alamat')";
                                    $query = mysqli_query($dbcon,$sql);
                                    if ($query) {
                                        echo "<script>alert('berhasil memasukkan data Alternatif')</script>";
                                    }else{
                                        echo "<script>alert('Gagal Memasukkan data')</script>";

                                    }
                                    
                                }else{
                                   
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
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIK</th>
                                                    <th>Nama Pelamar</th>
                                                    <th>Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data alternatif dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM alternatif";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;
                                                   while ($alternatif=mysqli_fetch_array($query)) {
                                                        
                                                ?>
                                                <tr>
                                                    <td><?=$n?></td>
                                                    <td><?=$alternatif['nik']?></td>
                                                    <td><?=$alternatif['nama']?></td>
                                                    <td><?=$alternatif['kelamin']?></td>
                                                    <td><?=$alternatif['ttl']?></td>
                                                    <td><?=$alternatif['alamat']?></td>
                                                    <td><a onclick="return confirm('Apakah yakin menghapus ?')" href='aksi/hapusa.php?name=<?=$alternatif['nik'];?>'>hapus</a> | <a href='aksi/edita.php?nik=<?=$alternatif['nik'];?>'>edit</a></td>
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