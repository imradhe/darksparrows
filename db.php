<?php
//Database Details
$server = "localhost";
$username = "root";
$password = "";
$dbname = "darksparrows";
$con = mysqli_connect("$server", "$username", "$password", "$dbname") or die(mysqli_error($con));