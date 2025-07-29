<?php
require 'config.php';
$id = intval($_GET['id']);
$chapter = $conn->query("SELECT * FROM chapters WHERE id=$id")->fetch_assoc();
?>
<h2><?php echo $chapter['title']; ?></h2>
<pre><?php echo htmlspecialchars($chapter['content']); ?></pre>