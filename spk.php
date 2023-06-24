<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">HASIL SPK</h1>
                        </div>
                        <form action="" method="post">
                            <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Nilai minimal</label>
                                <input type="text" name="nilai_min" class="form-control" required>                   
                            </div>
                            <div class="form-group col-md-2">
                                <label>Nilai Maksimal</label>
                                <input type="text" name="nilai_max" class="form-control" required>                    
                            </div>
                            <div class="form-group col-md-2">
                                <label><a href="" style="color: white">-</a></label>
                                <input type="submit" name="lihat"  class="form-control btn-primary" value="Lihat">
                            </div>
                            <div class="form-group col-md-2">
                                <label><a href="" style="color: white">-</a></label>
                                <a href="<?php echo $_SESSION['direct']; ?>laporan.php?dtgl=<?php echo @$_POST['dtgl']; ?>&stgl=<?php echo @$_POST['stgl']; ?>" target="_blank" name="cetak"  class="form-control btn-warning" align="center" style="text-decoration: none">Cetak</a>
                            </div>
                            </div> 
                        </form>
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Pelamar</th>
                                        <th>Nilai Tes Administrasi</th>
                                        <th>Nilai Tes Tulis</th>
                                        <th>Nilai Tes Wawancara</th>
                                        <th>Nilai Bobot Evaluasi</th> 
                                        <th>Pilihan Jurusan</th>

                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    $n = 1 ;

                                    $sqljumlah ="SELECT SUM(bobot) FROM kriteria";
                                    $queryjumlah= mysqli_query($dbcon,$sqljumlah);
                                    $jumlah0=mysqli_fetch_array($queryjumlah);
                                    $jumlah = $jumlah0[0];
                                    
                                    // bobot
                                    $sqlkriteria ="SELECT bobot FROM kriteria";
                                    $querykriteria = mysqli_query($dbcon, $sqlkriteria);
                                    $bobot=[];
                                    while ($bariskriteria= mysqli_fetch_array($querykriteria)) {
                                        $bobot[]=$bariskriteria['bobot'];
                                    }
                                    // var_dump($bobot);die();
                                    //end bobot
                                    
                                    //nilai 
                                    $sqlnilai = "SELECT * FROM penilaian";
                                    $querynilai = mysqli_query($dbcon,$sqlnilai);

                                    

                                    while ($barisnilai=mysqli_fetch_array($querynilai)) {  
                                        //nama
                                        $nik= $barisnilai['nik'];
                                        $sqlnama = "SELECT nama FROM siswa WHERE nik = $nik";
                                        $namasiswa = mysqli_fetch_array(mysqli_query($dbcon,$sqlnama));
                                        //nilai
                                        $nilaiA = $barisnilai['na']*($bobot[1]/$jumlah);
                                        $nilaiT = $barisnilai['nt']*($bobot[2]/$jumlah);
                                        $nilaiW = $barisnilai['nw']*($bobot[0]/$jumlah);
                                        $nilaievaluasi = $nilaiA + $nilaiT +$nilaiW;
                                        if ($nilaievaluasi >= 75) {
                                            $jurusan = "LULUS";
                                        }else{
                                            $jurusan = "TIDAK LULUS";
                                        }
                                        ?>
                                        <tr>
                                        <td><?=$n?></td>
                                        <td><?=$barisnilai['nik']?></td>
                                        <td><?=$namasiswa['nama'] ?></td>
                                        <td class="text-right"><?=$barisnilai['na']?></td>
                                        <td class="text-right"><?=$barisnilai['nt']?></td>
                                        <td class="text-right"><?=$barisnilai['nw']?></td>
                                        <td class="text-right"><?= round($nilaievaluasi,3)?></td>
                                        <td><?= $jurusan?></td>
                                        </tr>
                                    <?php    
                                    $n++;
                                    }
                                        
                                    ?>
                                    

                               
                                
                                    
                                </tbody>
                            </table>    
                        </div>
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