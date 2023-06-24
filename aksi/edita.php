<form action="update.php" method="POST">
	<?php
	include '../onek.php';
	$nik = $_GET['nik'];
	$query = mysqli_query($dbcon,"SELECT * FROM alternatif WHERE nik = '$nik'");
		$alternatif = mysqli_fetch_assoc($query);
		var_dump($alternatif);
		foreach ($alternatif as $key => $value) {	
	?>

			<input type="text" name="<?= $key ?>" placeholder="Name" value="<?= $value ?>">
	
	<?php } ?>
	<div>
	<button type="submit" name="submit">Update Order</button>
	</div>
	</form>
	<?php
?>