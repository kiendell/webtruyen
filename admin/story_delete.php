<?php
require '../config.php';
$id = intval($_GET['id']);
$conn->query("DELETE FROM stories WHERE id=$id");
$conn->query("DELETE FROM chapters WHERE story_id=$id"); // Xóa luôn các chương
header('Location: stories.php');
?>