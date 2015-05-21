<?php require_once('../header.php'); 
$q = $db->prepare('SELECT label FROM photos WHERE id = ?');
$q->execute([$_GET['id']]);
$photo = $q->fetch(); ?>


<form method=post action=/photos/update.php>
	<textarea name=label><?= $photo['label'] ?></textarea>
	<input type=hidden name=id value=<?= $_GET['id'] ?>>
	<button type=submit>Modifier</button>
</form>
<?php require_once('../footer.php'); 
