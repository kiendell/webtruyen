<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result && password_verify($pwd, $result['password'])) {
        $_SESSION['user'] = $result;
        header('Location: index.php');
    } else echo "Sai tài khoản hoặc mật khẩu!";
}
?>
<form method="post">
    Tài khoản: <input name="username"><br>
    Mật khẩu: <input type="password" name="password"><br>
    <button type="submit">Đăng nhập</button>
</form>