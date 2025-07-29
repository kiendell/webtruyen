<?php
require '../config.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') die('Không có quyền truy cập');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $desc = $_POST['description'];
    $conn->query("INSERT INTO stories(title,author,description) VALUES ('$title','$author','$desc')");
}
$stories = $conn->query("SELECT * FROM stories");
?>
<h2>Quản lý truyện</h2>
<form method="post">
    Tên truyện: <input name="title"><br>
    Tác giả: <input name="author"><br>
    Mô tả: <textarea name="description"></textarea><br>
    <button type="submit">Thêm truyện</button>
</form>
<ul>
<?php while ($row = $stories->fetch_assoc()): ?>
    <li>
        <?php echo $row['title']; ?>
        | <a href="story_edit.php?id=<?php echo $row['id']; ?>">Sửa</a>
        | <a href="chapters.php?story_id=<?php echo $row['id']; ?>">Quản lý chương</a>
    </li>
<?php endwhile; ?>
</ul>