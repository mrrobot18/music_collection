<?php

$id=$_POST['id'];
$email=$_POST['email'];
$pass=$_POST['pass'];

$conn=mysql_connect('localhost', 'aryasdev_main', 'Ilovebunnies@22');

$database="aryasdev_music_collection";

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

@mysql_select_db($database) or die( "Unable to select database");

$query = "INSERT INTO User VALUES ('$id', '$email', '$pass')";
mysql_query($query);

mysql_close();
?>