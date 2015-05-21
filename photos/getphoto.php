<?php require_once('../boot.php');
$q = $db->prepare('SELECT type, data FROM photos WHERE id = ?');
$q->execute([$_GET['id']]);
$q->bindColumn(1, $type, PDO::PARAM_STR, 256);
$q->bindColumn(2, $data, PDO::PARAM_LOB);
$q->fetch();
header("Content-Type: $type");
echo $data;
