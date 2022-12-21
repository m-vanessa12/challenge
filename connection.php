<?php

// connect with db
$server= "localhost";
$username= "root";
$password= "";
$db= "andela";

$conn=mysqli_connect($server, $username, $password, $db);

if(!$conn){
    die("Connection fail".mysqli_connect_error());
}

?>