<?php
require '../config.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') die('Không có quyền truy cập');
$story_id = intval($_GET['story_id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $number = intval($_POST['number']);
    $content = $_POST['content'];
    $conn->query("INSERT INTO chapters(story_id, title, content, number) VALUES ($story_id,'$title','$content',$number)");
}
$chapters = $conn->query("SELECT * FROM chapters WHERE story_id=$story_id ORDER BY number");
?>
<h2>Quản lý chương</h2>
<form method="post">
    Tên chương: <input name="title"><br>
    Số chương: <input name="number" type="number"><br>
    Nội dung: <textarea name="content"></textarea><br>
    <button type="submit">Thêm chương</button>
</form>
<ul>
<?php while ($row = $chapters->fetch_assoc()): ?>
    <li>
        <?php echo $row['number']; ?> - <?php echo $row['title']; ?>
        | <a href="chapter_edit.php?id=<?php echo $row['id']; ?>">Sửa</a>
    </li>
<?php endwhile; ?>
</ul>
<a href="stories.php">Quay lại quản lý truyện</a>