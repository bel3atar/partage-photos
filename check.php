<?php require_once('boot.php');
$q = $db->prepare('SELECT id, nom FROM users WHERE login = ? AND pass = ?');
$q->execute([$_POST['login'], $_POST['pass']]);
if ($q->rowCount() == 1) {
	$l = $q->fetch();
	$_SESSION['logged'] = TRUE;
	$_SESSION['uid'] = $l['id'];
	$_SESSION['nom'] = $l['nom'];
	header('Location: /photos/index.php');	
}else {
	header('Location: /login.php');	
}
