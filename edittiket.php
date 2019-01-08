<?php 
include('template/top.php');
include('template/navigasi.php');
 
 
$id=$_GET['id_tiket'];

$no=1;
$con = mysqli_connect("localhost","id8313853_user","kelompok5","id8313853_user") or die("Connection Failed". mysqli_error());
$sql = "SELECT * FROM tbl_tiket WHERE no_tiket='$id' "; 
$hasil=mysqli_query($con,$sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{
?>

<div id="main">
	<div class="content">
		<h3>Entry Tiket</h3>
		<form action="updatetiket.php" method="POST">

			<div class="input-group">
				<select name="no_konsumen" id="" style="width: 250px;">
					<option value='<?php echo $tampil['nama_kapal']; ?>'><?php echo $tampil['nama_kapal']; ?></option>

				</select>

			</div>

			<div class="input-group">
				<input type="text" placeholder="Nomor Tiket" value="<?php echo $tampil['no_tiket']; ?>" name="no_tiket" style="width: 228px;">
			</div>

			<div class="input-group">
				<input type="date" name="tgl_berangkat">
				<select name="hari_berangkat" id="">
					<option value="<?php echo $tampil['hari_berangkat']; ?>">-Pilih hari Berangkat-</option>
					<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum'at">Jum'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>
				</select>
				<input type="time" placeholder="Waktu keberangkatan" name="waktu_berangkat" value="<?php echo $tampil['waktu_berangkat']; ?>">
			</div>
			<div class="input-group">

					<input name="no_tujuan" value="<?php echo $tampil['no_tujuan']; ?>">

			</div>
			<div class="input-group">
				<button type="submit" class="btn">Kirim</button>
				<button type="reset" class="btn">Hapus</button>
			</div>

		</form>

	</div>
</div>


<?php include('template/footer.php'); }?>