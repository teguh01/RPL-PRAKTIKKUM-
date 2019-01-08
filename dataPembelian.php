<?php 
error_reporting(0);
include('template/top.php');
$kodekpl=$_POST['nama_kapal'];

?>
<div id="main">
    
   
	<div class="content">
	    <button onclick="window.location.href='logout.php'">Keluar ?</button>
    <button onclick="window.location.href='inputtiket.php'">Home</button>
    <button onclick="window.location.href='cariAdmin.php'">Data Pembelian</button>
		<h3>Data Tujuan Pelayaran</h3>
		<button class="print" onclick="PrintDoc()"><img src="img/print.png">Print Data</button>
		<button class="print" onclick="PrintPreview()"><img src="img/preview.png">Print Preview</button>


<table id="tabel"  border="1" cellpadding="3" >
	<tr>
		<th style="width: 20px;">No</th>
		<th>Akun</th>
		<th>Nama</th>
		<th>No HP</th>
		<th>Nama Kapal</th>
		<th>Tujuan</th>
		<th>Tanggal Berangkat</th>
		<th>Pembayarab</th>
		<th style="width: 40px;">Verifikasi</th>
		<th style="width: 40px;">Delete</th>
	</tr>
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_pembelian WHERE nama_kapal LIKE '%$kodekpl%'"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['id'];
				?>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $data['username'];?></td>
					<td><?php echo $data['nama'];?></td>
					<td><?php echo $data['no_hp']; ?></td>
					<td><?php echo $data['nama_kapal']; ?></td>
					<td><?php echo $data['tujuan']; ?></td>
				    <td><?php echo $data['tanggal_berangkat']; ?></td>
				    <td><?php echo $data['pembayaran']; ?></td>
			        <td class="Verifikasi">
			    	<a href="verifikasi.php?id_tiket=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/edit.png" alt="Verifikasi Data"></a>
			        </td>
			        <td class="Delete">
			    	<a href="Delete.php?id_tiket=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data">
			    	    
			    	    
			    	    </a>
			    	    
			        </td>
		</tr>
		<?php } ?>
	</table>
	</div>
	</div>
		<?php include('template/footer.php'); ?>