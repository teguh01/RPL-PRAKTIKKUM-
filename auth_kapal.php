<?php

session_start();
if(!isset($_SESSION["tiket"])) header("Location: entry_tiket.php");