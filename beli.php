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

 
 
if(isset($_POST['beli'])){

    // filter data yang diinputkan
    $username = $_SESSION['user']['username'];
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_NUMBER_INT);
    $username = $_SESSION['user']['username'];
    $id=$_GET['id_tiket'];
   $con = mysqli_connect("localhost","id8313853_user","kelompok5","id8313853_user") or die("Connection Failed". mysqli_error());
    $sql1 = "SELECT * FROM tbl_tiket_lain WHERE  id= $id "; 
    $hasil=mysqli_query($con,$sql1) or die(mysqli_error());
    $data = mysqli_fetch_array ($hasil);
    
    $nama_kapal =$data['nama_kapal'];
	$tujuan =$data['no_tujuan'];
	$tanggal_berangkat = $data['tanggal_berangkat'];
	

    // menyiapkan query
    $sql = "INSERT INTO tbl_pembelian (username, nama, no_hp, nama_kapal, tujuan, tanggal_berangkat) 
            VALUES (:username, :nama, :no_hp, :nama_kapal, :tujuan , :tanggal_berangkat)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":nama" => $nama,
        ":no_hp" => $no_hp,
        ":nama_kapal" => $nama_kapal,
        ":tujuan" => $tujuan,
        ":tanggal_berangkat" => $tanggal_berangkat,
       
       
    );
    

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    $kuota =1;
     $sql3 = "Update tbl_tiket_lain SET kuota = kuota - '$kuota' WHERE id='$id'";
   // $sql = "DELETE FROM tbl_tiket_lain where id='$id'";
    $result = mysqli_query ($conn,$sql3) or die (mysqli_errno());
    
   
    

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembelian Tiket</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <button onclick="window.location.href='entry_tujuan.php'">Kembali</button>
        <button onclick="window.location.href='keranjang.php'">Tiket Saya</button>

        <form action="" method="POST">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor Hp</label>
                <input class="form-control" type="number" name="no_hp" placeholder="Nomor Hp" />
            </div>
            
			        
            <input type="submit" class="btn btn-success btn-block" name="beli" value="beli" />

        </form>
            
        </div>
    </div>
</body>
</html>
</div>
<?php include('template/footer.php'); ?>