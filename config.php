<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "web_film";
$db = mysqli_connect($hostname, $username, $password, $database);
if (!$db) {
    echo "Koneksi tidak terhubung";
}
