<?php

/*
//072823
$dsn = "mysql:host=localhost;dbname=paintjobs";
$dbusername = "root";
$dbpassword = "";

try {
    // pdo connection
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "CONNECTED";
} catch (PDOException $e) {
    echo "Connection failed: ", $e->getMessage();
}
*/
//073123
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "paintjobs";

// create connection using mysqli procedural
$conn = mysqli_connect($servername, $dbusername, $dbpassword,$dbname);

if (!$conn){
    die("CONNECTION FAILED: " . mysqli_connect_error());
} 
//echo "CONNECTED successfully";