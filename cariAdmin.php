<?php
require_once("config.php");
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['user'])) {
 	header('Location:login.php');
 }
 
 if ($_SESSION['user']['username'] != 'admin') {
 	header('Location:home.php');
 }
 
include('template/top.php');
?>

<div id="main">
   
	<div class="content">
	     <button onclick="window.location.href='logout.php'">Keluar ?</button>
    <button onclick="window.location.href='inputtiket.php'">Home</button>
		<h3>Pilih Pencarian</h3>
		<form action="dataPembelian.php" method="POST">
			<div class="input-group">
						<select name="nama_kapal" id="" style="width: 250px;">
					<option value="0">-Pilih Nama Kapal-</option>
					<?php 
					$con = mysqli_connect("localhost","id8313853_user","kelompok5","id8313853_user") or die("Connection Failed". mysqli_error());
					$sql = "SELECT * FROM tbl_kapal ORDER BY nama_kapal ASC"; 
					$hasil=mysqli_query($con,$sql) or die(mysql_error());
					while($rows=mysqli_fetch_array($hasil)){
						echo "<option value='". $rows['nama_kapal']."'>". $rows['nama_kapal']."</option>"; 
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