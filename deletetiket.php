<?php 
include 'koneksi/conn.php';
$id=$_GET['id_tiket'];
$sql = "DELETE FROM tbl_tiket_lain where id='$id'";
$result = mysqli_query ($conn,$sql) or die (mysqli_errno());
header("location:dataPembelian.php")
?>


