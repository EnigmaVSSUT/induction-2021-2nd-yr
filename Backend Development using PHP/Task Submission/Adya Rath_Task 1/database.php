<?php
$conn = mysqli_connect("localhost","u433587263_adi","Adya@2001","u433587263_api");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>