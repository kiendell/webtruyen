<?php
require 'config.php';
$id = intval($_GET['id']);
$story = $conn->query("SELECT * FROM stories WHERE id=$id")->fetch_assoc();
$chapters = $conn->query("SELECT * FROM chapters WHERE story_id=$id ORDER BY number");
?>
<h2><?php echo $story['title']; ?></h2>
<p>Tác giả: <?php echo $story['author']; ?></p>
<p><?php echo $story['description']; ?></p>
<h3>Danh sách chương</h3>
<ul>
<?php while ($c = $chapters->fetch_assoc()): ?>
    <li><a href="chapter.php?id=<?php echo $c['id']; ?>"><?php echo $c['title']; ?></a></li>
<?php endwhile; ?>
</ul>