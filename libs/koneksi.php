<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_iwapi';

$conn = mysqli_connect($server, $user, $pass);
$db = mysqli_select_db($conn, $db);
