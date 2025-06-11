<?php
// Create connection
$conn = mysqli_connect('localhost','root' ,'','crudseries',3307 );

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>