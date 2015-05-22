<?php require_once('../header.php'); 
$q = $db->prepare('SELECT u.id as id, date, label, nom, type, p.id as pid 
	FROM photos p JOIN users u ON u.id = p.user_id
	WHERE p.id = ?');
$q->execute([$_GET['id']]);
$p = $q->fetch();
?>
	<?php if (strpos($p['type'], 'image') !== FALSE): ?>
		<img src='/photos/getphoto.php?id=<?= $p['pid'] ?>'>
	<?php else: ?>
		<video width="320" height="240" controls>
			<source src='/photos/getphoto.php?id=<?= $p['pid'] ?>' type=<?= $p['type'] ?>>
			Votre navigateur ne supporte pas la balise video.
		</video>
	<?php endif ?>
	Libellé <?= $p['label'] ?>
	Posté par <?= $p['nom'] ?>
	Le <?= strftime('%d-%m-%Y', $p['date']) ?>
	<?php if (sess_get('uid') == $p['id']): ?>
		<a href=/photos/delete.php?id=<?= $p['pid'] ?>>Supprimer</a>
		<a href=/photos/modifier.php?id=<?= $p['pid'] ?>>Modifier</a>
	<?php endif ?>
	<h1>Commentaires</h1>
	<dl>
		<?php $q = $db->prepare('SELECT comment, nom
			FROM comments c JOIN users u ON u.id = c.user_id
			WHERE c.photo_id = ?');
			$q->execute([$p['pid']]);
		while ($c = $q->fetch()):?>
			<dt><?= $c['nom'] ?></dt>	
			<dd><?= $c['comment'] ?></dd>	
		<?php endwhile ?>
	</dl>
	<form method=post action=/photos/comment.php>
		<input type=hidden name=photo value=<?= $p['pid'] ?>>
		<textarea name=comment></textarea>
		<button type=submit>Commenter</button>
	</form>
<?php require_once('../footer.php'); ?>
