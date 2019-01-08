<?php

$db_host = "localhost"; //memasukkan nama host 
$db_user = "id8313853_user";// memasukkan nama user
$db_pass = "kelompok5";// memasukkan password
$db_name = "id8313853_user";

try {    
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass); //membuat konesi PDO
} catch(PDOException $e) {
    die("Terjadi masalah: " . $e->getMessage()); //menampilkan terjadi masalah 
}
