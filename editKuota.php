<?php

include 'koneksi/conn.php';
require_once("config.php");
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['user'])) {
 	header('Location:login.php');
 }
 
 if ($_SESSION['user']['username'] != 'admin') {
 	header('Location:home.php');
 }
 
 

 
if(isset($_POST['update'])){

    // filter data yang diinputkan
   
    
    $kuota= filter_input(INPUT_POST,'kuota',  FILTER_SANITIZE_NUMBER_INT);
    $kuotaBatal= filter_input(INPUT_POST,'kuotaBatal',  FILTER_SANITIZE_NUMBER_INT);
   

    $id=$_GET['id_tiket'];
    
  
    // menyiapkan query
    $sql = "Update tbl_tiket_lain SET kuota = kuota - '$kuota' WHERE id='$id'";
   // $sql = "DELETE FROM tbl_tiket_lain where id='$id'";
    $result = mysqli_query ($conn,$sql) or die (mysqli_errno());
    
     $sql1 = "Update tbl_tiket_lain SET kuota = kuota + '$kuotaBatal' WHERE id='$id'";
   // $sql = "DELETE FROM tbl_tiket_lain where id='$id'";
    $result2 = mysqli_query ($conn,$sql1) or die (mysqli_errno());
   

    
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin :)</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            

        <p><a href="logout.php">Log out</a>
        <p><a href="dataPembelian.php">Lihat Data Pembelian</a>
        <p><a href="inputtiket.php">Home</a>
        

        <form action="" method="POST">

              <div class="form-group">
                <label for="kuota">Jumlah Beli Offline</label>
                <input class="form-control" type="number" name="kuota" placeholder="Jumlah Beli Offline" />
            </div>
            
              <div class="form-group">
                <label for="kuota">Jumlah Batal</label>
                <input class="form-control" type="number" name="kuotaBatal" placeholder="Jumlah Beli Batal" />
            </div>


            <input type="submit" class="btn btn-success btn-block" name="update" value="Input" onclick="alert('Berhasil:))))')"/>

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/kapal.jpg" />
        </div>
        
    </div>
            <h3>Data Tiket</h3>
		<?php include('data/data_tiket.php'); ?>
</div>
</body>
</html>