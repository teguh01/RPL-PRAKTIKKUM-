<?php require_once("auth.php");
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
		<marquee style="background: #07A0DC; padding:5px; color: #fff;"><h2>Selamat Datang Di ULship :D Website Penjualan Tiket Kapal Online Mempermudah Anda Dalam Menyebrangi Lautan</h2></marquee>
		<div id="profile">
			<center>
				<h2>TIKET KAPAL</h2>
				<hr/>
			</center>
			

		</div>
		<hr/>

		<br />
		<br />
		<br />
	</div>
</div>


<?php include('template/footer.php'); ?>