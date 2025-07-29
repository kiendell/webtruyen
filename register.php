<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users(username, password) VALUES (?,?)");
    $stmt->bind_param('ss', $username, $password);
    if ($stmt->execute()) echo "Đăng ký thành công!";
    else echo "Tên tài khoản đã tồn tại!";
}
?>
<form method="post">
    Tài khoản: <input name="username"><br>
    Mật khẩu: <input type="password" name="password"><br>
    <button type="submit">Đăng ký</button>
</form>