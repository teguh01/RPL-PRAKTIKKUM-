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
		
<table id="tabel"  border="1" cellpadding="3" >
	<tr>
		<th style="width: 20px;">No</th>
		<th style="width: 50px;">Nama Kapal</th>
		<th style="width: 100px;">Nomor Tiket</th>
		<th>Tanggal Berangkat</th>
		<th>Hari Berangkat</th>
		<th>Waktu Berangkat</th>
		<th>Tujuan</th>
		<th style="width: 40px;">Delete</th>
	</tr>
	<?php 
	$con = mysqli_connect("localhost","id8313853_user","kelompok5","id8313853_user") or die("Connection Failed". mysqli_error());
	$sql = "SELECT * FROM tbl_tiket WHERE tujuan LIKE '%$kodetjn%'"; 
	$hasil=mysqli_query($con,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
		$id=$data['no_tiket'];
		?>
		<tr>

			<td><?php echo $no++?></td>
			<td><?php echo $data['nama_kapal'];?></td>
			<td><?php echo $data['no_tiket']; ?></td>
			<td><?php echo $data['tgl_berangkat']; ?></td>
			<td><?php echo $data['hari_berangkat']; ?></td>
			<td><?php echo $data['waktu_berangkat']; ?></td>
			<td><?php echo $data['tujuan']; ?></td>
			<td class="delete">
				<a href="deletetiket.php?id_tiket=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data"></a>
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	
<?php include('template/footer.php'); ?>	