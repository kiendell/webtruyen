<form method="get" action="">
    <input name="q" placeholder="Tìm truyện...">
    <button type="submit">Tìm</button>
</form>
<?php
$q = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';
$sql = "SELECT * FROM stories";
if ($q) $sql .= " WHERE title LIKE '%$q%'";
$stories = $conn->query($sql);
?>