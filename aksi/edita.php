<form action="update_data.php" method="POST">
	<?php
	include '../onek.php';
	$nik = $_GET['nik'];
		$query = mysqli_query($dbcon,"SELECT * FROM alternatif WHERE nik = '$nik'");
		$alternatif = mysqli_fetch_assoc($query);
		var_dump($alternatif);
		foreach ($alternatif as $value) {	
	?>
	<div>
			<input type="text" name="NewName" placeholder="Name" value="<?= $value ?>">
	</div>
	<?php } ?>
	</form>
	<?php
?>