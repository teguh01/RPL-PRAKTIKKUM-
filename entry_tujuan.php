<?php
require_once("config.php");
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['user'])) {
 	header('Location:login.php');
 }
include('template/top.php');
include('template/navigasi.php');
?>

<div id="main">
	<div class="content">
		<h3>Pilih Destinasi</h3>
		<form action="inserttujuan.php" method="POST">
			<div class="input-group">
						<select name="nama_tujuan" id="" style="width: 250px;">
					<option value="0">-Pilih Tujuan Kota-</option>
					<?php 
					$con = mysqli_connect("localhost","id8313853_user","kelompok5","id8313853_user") or die("Connection Failed". mysqli_error());
					$sql = "SELECT * FROM tbl_tujuan ORDER BY nama_tujuan ASC"; 
					$hasil=mysqli_query($con,$sql) or die(mysql_error());
					while($rows=mysqli_fetch_array($hasil)){
						echo "<option value='". $rows['nama_tujuan']."'>". $rows['nama_tujuan']."</option>"; 
					}
					?>
				</select>
			</div>
			<div class="input-group">
				<button type="submit" class="btn">Cari</button>
			</div>
		</form>	
		<hr/>
	</div>
</div>


<?php include('template/footer.php'); ?>