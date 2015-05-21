<?php require_once('../boot.php');
$q = $db->prepare('UPDATE photos SET label = ? WHERE id = ?');
$q->execute([$_POST['label'], $_POST['id']]);
header("Location: /photos/show.php?id={$_POST['id']}");
