<?php
/* php& mysqldb connection file */
$user = "root"; //mysqlusername
$pass = ""; //mysqlpassword
$server = "localhost"; //server name or ipaddress
$dbname= "salyscafedb"; //your db name
$conn = mysqli_connect($server,$user,$pass,$dbname);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>