<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "library_php";
$conn = "";

try{
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    // to include vietnamese data
    mysqli_set_charset($conn,"utf8");

}
catch (mysqli_sql_exception){
    die ("ERROR: " . mysqli_connect_error());
}