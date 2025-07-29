<?php
require '../config.php';
$id = intval($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $desc = $_POST['description'];
    $conn->query("UPDATE stories SET title='$title', author='$author', description='$desc' WHERE id=$id");
    header('Location: stories.php');
}
$story = $conn->query("SELECT * FROM stories WHERE id=$id")->fetch_assoc();
?>
<form method="post">
    Tên truyện: <input name="title" value="<?php echo htmlspecialchars($story['title']); ?>"><br>
    Tác giả: <input name="author" value="<?php echo htmlspecialchars($story['author']); ?>"><br>
    Mô tả: <textarea name="description"><?php echo htmlspecialchars($story['description']); ?></textarea><br>
    <button type="submit">Cập nhật</button>
</form>