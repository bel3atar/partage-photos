<?php require_once('../header.php'); 
$q = $db->prepare('SELECT u.id as id, label, nom, type, p.id as pid 
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
	<?php if (sess_get('uid') == $p['id']): ?>
		<a href=/photos/delete.php?id=<?= $p['pid'] ?>>Supprimer</a>
		<a href=/photos/modifier.php?id=<?= $p['pid'] ?>>Modifier</a>
	<?php endif ?>
<?php require_once('../footer.php'); ?>
