<?php
$servername = "localhost";
$username = "root";
$password = "";
//$port=3307;
$database ="shop_bong_ro";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>