<?php require_once('../boot.php');
$q = $db->prepare('DELETE FROM photos WHERE id = ?');
$q->execute([$_GET['id']]);
header("Location: {$_SERVER['HTTP_REFERER']}");
