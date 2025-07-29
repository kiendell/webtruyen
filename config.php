<?php
$host = 'localhost';
$db   = 'webtruyen';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die('Database connection error');
session_start();
?>