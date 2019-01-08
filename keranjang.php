<?php
include 'koneksi/conn.php';
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
        
        
        
		<h3>Tiket Anda</h3>
		<button class="print" onclick="PrintDoc()"><img src="img/print.png">Print Data</button>
		<button class="print" onclick="PrintPreview()"><img src="img/preview.png">Print Previ</button>
<form action="pembelian.php" method="POST">	
<table id="tabel"  border="1" cellpadding="3" >
			<tr>
				<th style="width: 20px;">No</th>
				<th>Nama</th>
		        <th>No HP</th>
		        <th>Nama Kapal</th>
		        <th>Tujuan</th>
		        <th>Tanggal Berangkat</th>
		        <th>Pembayarab</th>
				

			</tr>
			<?php include('koneksi/conn.php'); 
			$username = $_SESSION['user']['username'];
			$sql = "SELECT * FROM tbl_pembelian WHERE username = '$username' "; 
			$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
			$no=1;
			while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['id'];
				?>
				<tr>

					<td><?php echo $no++?></td>

					<td><?php echo $data['nama'];?></td>
					<td><?php echo $data['no_hp']; ?></td>
					<td><?php echo $data['nama_kapal']; ?></td>
					<td><?php echo $data['tujuan']; ?></td>
				    <td><?php echo $data['tanggal_berangkat']; ?></td>
				    <td><?php echo $data['pembayaran']; ?></td>
				
			     
		        	</td>
		</tr>
		<?php } ?>
	</table>
</form>	
	</div>
</div>	
<?php include('template/footer.php'); ?>	