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
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_tiket ORDER BY no_tiket ASC"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
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
