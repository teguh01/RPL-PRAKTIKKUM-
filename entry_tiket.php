<?php 
include('koneksi/conn.php');
include('template/top.php');
include('template/navigasi_admin.php');
$no = 1;
$sql = "SELECT * FROM tbl_tiket_lain ORDER BY id DESC limit 1"; 
$hasil=mysqli_query($conn,$sql) or die(mysqli_error());


?>

<div id="main">
	<div class="content">
		<h3>Entry Tiket</h3>
		<form action="inserttiket.php" method="POST">
		    
            <div class="input-group">
				<select name="nama_kapal"  style="width: 250px;">
					<option value="0">-Pilih Nama Kapal-</option>
					<?php 
                    $sql2 = "SELECT * FROM tbl_kapal ORDER BY nama_kapal ASC"; 
                    $hasil=mysqli_query($conn,$sql2) or die(mysqli_error());
					while($rows=mysqli_fetch_array($hasil)){
						echo "<option value='". $rows['nama_kapal']."'>". $rows['nama_kapal']."</option>"; 
					}
					?>
				</select>
			</div>

			<div class="input-group">
				<input type="date" name="tgl_berangkat">
				<select name="hari_berangkat" id="">
					<option value="0">-Pilih hari Berangkat-</option>
					<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum'at">Jum'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>
				</select>
				<input type="time" placeholder="Waktu keberangkatan" name="waktu_berangkat">
			</div>
			<div class="input-group">
				<select name="no_tujuan" style="width: 250px;">
					<option value="0">-Pilih Kota Tujuan-</option>
					<?php 
					$sql = "SELECT * FROM tbl_tujuan ORDER BY nama_tujuan DESC"; 
					$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
					while($rows=mysqli_fetch_array($hasil)){
						echo "<option value='". $rows['nama_tujuan']."'>". $rows['nama_tujuan']."</option>"; 
					}
					?>
				</select>
			</div>
			<div class="input-group">
				<select name="harga"  style="width: 250px;">
					<option value="0">-Harga Keberangkatan-</option>
					<?php 
                    $sql2 = "SELECT * FROM tbl_harga ORDER BY harga ASC"; 
                    $hasil=mysqli_query($conn,$sql2) or die(mysqli_error());
					while($rows=mysqli_fetch_array($hasil)){
						echo "<option value='". $rows['harga']."'>". $rows['harga']."</option>"; 
					}
					?>
				</select>
			</div>
			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>
                
            
		</form>

		<hr/>
		<h3>Data Tiket</h3>
		<?php include('data/data_tiket.php'); ?>
	</div>
</div>


<?php include('template/footer.php'); ?>