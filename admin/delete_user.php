<?php require_once('../boot.php');
$q = $db->prepare('DELETE FROM users WHERE id = ?');
$q->execute([$_GET['id']]);
header('Location: /admin');
