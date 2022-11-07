<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fime-posts";

$con = mysqli_connect($servername, $username, "", $db);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
