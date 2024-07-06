<?php

$host = 'localhost'; 
$dbname = 'techinnovatorsdb';
$username = 'Ethan';
$password = 'WORDPASS12345!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect to the database. " . $e->getMessage());
}


