<?php
//database connection
$host = 'localhost';
$username = "root";
$password = "";
$database = "brainbulb";
$connection = mysqli_connect($host, $username, $password, $database);
if ($connection === false) ///if connection fails then exit the script and display error message 
{
    die("Connection failed: " . mysqli_connect_error());
}
$dsn = "mysql:host=$host;dbname=$database";
$pdo = new PDO($dsn, $username, $password);
?>