<?php
include('template/top.php');
include('template/navigasi.php');
$kodetjn=$_POST['nama_tujuan'];
?>
<div id="main">
    <div class="content">
        <input type="button" value="Go Back" onclick="history.back(-1)" />
		<h3>Data Keberangkatan</h3>
		<button class="print" onclick="PrintDoc()"><img src="img/print.png">Print Data</button>
		<button class="print" onclick="PrintPreview()"><img src="img/preview.png">Print Previ</button>
<form action="pembelian.php" method="POST">	
<table id="tabel"  border="1" cellpadding="3" >
			<tr>
				<th style="width: 20px;">No</th>
				<th style="width: 50px;">Nama Kapal</th>
				<th>Tanggal Berangkat</th>
				<th>Waktu Berangkat</th>
				<th>Tujuan</th>
				<th>harga</th>
			    <th>kouta</th>
			    <th>Pesan Tiket</th>

			</tr>
			<?php include('koneksi/conn.php'); 
			$sql = "SELECT * FROM tbl_tiket_lain WHERE no_tujuan LIKE '%$kodetjn%'"; 
			$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
			$no=1;
			while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['id'];
				?>
				<tr>

					<td><?php echo $no++?></td>
					<td><?php echo $data['nama_kapal'];?></td>
					<td><?php echo $data['tanggal_berangkat']; ?></td>
					<td><?php echo $data['waktu_berangkat']; ?></td>
					<td><?php echo $data['no_tujuan']; ?></td>
				    <td><?php echo $data['harga']; ?></td>
				    <td><?php echo $data['kuota']; ?></td>
			        <td class="pesan">
			    	<a href="beli.php?id_tiket=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi">BELI </a>
		        	</td>
		</tr>
		<?php } ?>
	</table>
</form>	
	</div>
</div>	
<?php include('template/footer.php'); ?>	