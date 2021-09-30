<?php
$username="root";
$password="";
$server= "localhost";
$dbname= "gamestore";

$conn = new mysqli($server, $username, $password, "$dbname");

if ($conn -> connect_error) {
  die("Connection Failed: " . $conn -> connection_error );
} else {
  $terserah = 'connect';
}
?>