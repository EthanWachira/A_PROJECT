<?php
$servername = "localhost";
$username = "Ethan"; 
$password = "WORDPASS12345!"; 
$dbname = "techinnovatorsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
