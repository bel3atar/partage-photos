<?php require_once('../boot.php'); 
$q = $db->prepare('SELECT * FROM users WHERE id = ?');
$q->execute([$_GET['id']]);
$u = $q->fetch();?>
<form method=post action=/admin/update_user.php>
	<input type=hidden name=id value=<?= $_GET['id'] ?>>
	<input name=nom   value=<?= $u['nom'] ?>>
	<input name=login value=<?= $u['login'] ?>>
	<input name=pass  value=<?= $u['pass'] ?>>
	<button type=submit>Modifier</button>
</form>
