<?php require_once('../boot.php');
$q = $db->prepare('UPDATE users SET nom = ?, login = ?, pass = ? WHERE id = ?');
$q->execute([
	$_POST['nom'],
	$_POST['login'],
	$_POST['pass'],
	$_POST['id']
]);
header('Location: /admin');
