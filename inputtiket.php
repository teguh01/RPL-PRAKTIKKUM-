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
 
 
include('template/top.php');
 
if(isset($_POST['inputtiket'])){

    // filter data yang diinputkan
    $nama_kapal = filter_input(INPUT_POST,'nama_kapal', FILTER_SANITIZE_STRING);
    $tanggal_berangkat = filter_input(INPUT_POST,'tanggal_berangkat');
    $waktu_berangkat= filter_input(INPUT_POST,'waktu_berangkat', FILTER_SANITIZE_STRING);
    $no_tujuan=filter_input(INPUT_POST,'no_tujuan', FILTER_SANITIZE_STRING);
    $harga=filter_input(INPUT_POST,'harga', FILTER_SANITIZE_STRING);
    $kuota= filter_input(INPUT_POST,'kuota',  FILTER_SANITIZE_NUMBER_INT);
   


    // menyiapkan query
    $sql = "INSERT INTO tbl_tiket_lain (nama_kapal, tanggal_berangkat, waktu_berangkat, no_tujuan, harga, kuota) 
            VALUES (:nama_kapal, :tanggal_berangkat, :waktu_berangkat, :no_tujuan, :harga, :kuota)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":nama_kapal" => $nama_kapal,
        ":tanggal_berangkat" => $tanggal_berangkat,
        ":waktu_berangkat" => $waktu_berangkat,
        ":no_tujuan" => $no_tujuan,
        ":harga" => $harga,
        ":kuota" => $kuota
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
   

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Tiket :)</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <form action="" method="POST">

            <div class="form-group">
                <label for="nama_kapal">Nama Kapal</label>
                    <select name="nama_kapal">
                    <option value="KM Central Jet">KM Central Jet</option>
                    <option value="KM Express Bahari">KM Express Bahari</option>
                  </select>
            </div>
            <div class="form-group">
                <label for="tanggal_berangkat">Tanggal_berangkat</label>
               <input name="tanggal_berangkat" type="date" />
     
            </div>
            
             

            <div class="form-group">
                <label for="waktu_berangkat">Waktu Berangkat    </label>
                    <select name="waktu_berangkat">
                    <option value="Pagi">Pagi</option>
                    <option value="Siang">Siang</option>
                    <option value="Malam">Malam</option>
                                    
                  </select>
            </div>

            <div class="form-group">
                <label for="no_tujuan">tujuan   </label>
                 <select name="no_tujuan">
                    <option value="Banda Aceh - Sabang">Banda Aceh - Sabang</option>
                    <option value="Sabang - Banda Aceh">Sabang - Banda Aceh</option>
                    
                                    
                  </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
               <select name="harga">
                    <option value="Rp. 70.000">Rp.70.000</option>
                    <option value="Rp. 75.000">Rp.75.000</option>
                
                  </select>
            </div>
              <div class="form-group">
                <label for="kuota">kuota </label>
                <input class="form-control" type="number" name="kuota" placeholder="Kuota" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="inputtiket" value="Input" onclick="alert('Berhasil Admin')"/>
        

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/kapal.jpg" />
        
        </div>
        <div class="col-md-3">
            
        <button onclick="window.location.href='logout.php'">Log Out</button>
        <button onclick="window.location.href='cariAdmin.php'">Lihat Data Pembelian</button>
        
        </div>
               
    </div>
            <h3>Data Tiket</h3>
		<?php include('data/data_tiket.php'); ?>
</div>
</body>
</html>
	<?php include('template/footer.php'); ?>