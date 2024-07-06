<?php
$servername = "127.0.0.1 via TCP/IP";
$username = "root@localhost"; 
$password = "WORDPASS12345!"; 
$dbname = "techinnovatorsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
