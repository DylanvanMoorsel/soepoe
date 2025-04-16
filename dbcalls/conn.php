<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=soepoe", $username, $password);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>