<?php
	session_start();
	include '../onek.php';

	if (isset($_GET['name'])) {
		
		$id_kriteria = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM kriteria WHERE id_kriteria = '$id_kriteria'");
		echo "<script>confirm('berhasil menghapus beserta nilai')</script>";
		header("location:../kriteria.php");

	}else{
		echo "<h1>Gagal Menghapus Data</h1>";
	}

?>