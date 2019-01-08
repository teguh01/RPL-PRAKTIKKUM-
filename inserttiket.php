<?php
$id = $_GET['id'];
$noksm=$_POST['nama_kapal'];
$tglb=$_POST['tgl_berangkat'];
$hbrangkat=$_POST['hari_berangkat'];
$wberangkat=$_POST['waktu_berangkat'];
$notujuan=$_POST['no_tujuan'];
$hargakpl=$_POST['harga'];



$con = mysqli_connect("localhost","id8313853_user","kelompok5","id8313853_user") or die("Connection Failed". mysqli_error());
$query	= "INSERT INTO tbl_tiket_lain values('$id','$noksm','$tglb','$hbrangkat','$wberangkat','$notujuan,'$hargakpl')";
$result = mysqli_query($con,$query) or die(mysqli_error()) ;
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_tiket.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_tiket.php>";
}
?>


