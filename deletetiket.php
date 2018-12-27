<?php 
include('template/top.php');
include('template/navigasi.php');
include 'koneksi/conn.php';

$id=$_GET['id_tiket'];
$sql = "DELETE FROM tbl_tiket where no_tiket='$id'";
$result = mysqli_query ($conn,$sql) or die (mysqli_errno());
?>

<div id="main">
	<div class="content">	
		<?php
		echo "<br/><br/><h4>Data telah di hapus</h4>";
		echo "<meta http-equiv=refresh content=1;url=entry_tiket.php>";
		?>
	</div>
</div>


<?php include('template/footer.php'); ?>

