<?php
$Open = mysql_connect("localhost","id8313853_user","kelompok5");
    if (!$Open){
    die ("Koneksi ke Engine MySQL Gagal !<br>");
        }
$Koneksi = mysql_select_db("id8313853_user");
    if (!$Koneksi){
    die ("Koneksi ke Database Gagal !");
    }
//menampilkan data
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {
  $search = $_POST['search'];
  $sql = mysql_query("SELECT * FROM mahasiswa WHERE nama LIKE '%$search%'") or die(mysql_error());
    //menampilkan jumlah hasil pencarian
  $jumlah = mysql_num_rows($sql); 
  if ($jumlah > 0) {
    echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';
    $nomer=0;
    while (    $hasil = mysql_fetch_array ($sql)) {
        $nomer++;
        $id_mahasiswa = stripslashes ($hasil['id_mahasiswa']);
        $nama = stripslashes ($hasil['nama']);
        $jurusan = stripslashes ($hasil['jurusan']);
        $alamat = stripslashes ($hasil['alamat']);
        $telepon = stripslashes ($hasil['telepon']);
        }
?>
<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1110px; height:375px;">
<form action="<?$_SERVER['PHP_SELF']?>" method="POST" name="pencarian" id="pencarian">
    <strong>Pencarian  :</strong>
    <input type="text" name="search" id="search" size="20"> * Isi Nomor Hp<br><br>                  
    <input type="submit" name="submit" id="submit" value="CARI">
</form>
<table width="1110" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#FFA800">
        <td width="30">No</td> 
        <td width="70" height="42">NIM</td> 
        <td width="120">Nama</td> 
        <td width="70">Jurusan</td>       
        <td width="85">Alamat</td> 
        <td width="70">Telepon</td> 
    </tr>
    <tr align="center" bgcolor="#DFE6EF">
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
    <tr align="center">
        <td><?=$nomer?><div align="center"></div></td>
        <td><?=$id_mahasiswa?><div align="center"></div></td>
        <td><?=$nama?><div align="center"></div></td>
        <td><?=$jurusan?><div align="center"></div></td>
        <td><?=$alamat?><div align="center"></div></td>
        <td><?=$telepon?><div align="center"></div></td>
    </tr>
    <tr align="center" bgcolor="#DFE6EF">
        <td> </td>
        <td> </td>
        <td> </td> 
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
</table>
<?
    }
    else {
   // menampilkan pesan zero data
        echo 'Maaf, hasil pencarian tidak ditemukan.';
    }
}
//Tutup koneksi engine MySQL
    mysql_close($Open);
?>
</div>