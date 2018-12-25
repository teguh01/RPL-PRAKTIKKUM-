<?php

$db_host = "localhost"; //memasukkan nama host 
$db_user = "root";// memasukkan nama user
$db_pass = "khalid10";// memasukkan password
$db_name = "user";

try {    
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass); //membuat konesi PDO
} catch(PDOException $e) {
    die("Terjadi masalah: " . $e->getMessage()); //menampilkan terjadi masalah 
}
