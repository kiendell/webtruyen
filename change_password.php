<?php
require 'config.php';
if (!isset($_SESSION['user'])) die('Phải đăng nhập!');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $user = $_SESSION['user'];
    $row = $conn->query("SELECT * FROM users WHERE id=".$user['id'])->fetch_assoc();
    if (!password_verify($old, $row['password'])) die('Sai mật khẩu cũ');
    $new_hash = password_hash($new, PASSWORD_DEFAULT);
    $conn->query("UPDATE users SET password='$new_hash' WHERE id=".$user['id']);
    echo 'Đổi mật khẩu thành công!';
}
?>
<form method="post">
    Mật khẩu cũ: <input type="password" name="old_password"><br>
    Mật khẩu mới: <input type="password" name="new_password"><br>
    <button type="submit">Đổi mật khẩu</button>
</form>