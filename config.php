<?php
$host = 'localhost';
$db   = 'webtruyen';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die('Lỗi kết nối CSDL');
session_start();
?>
