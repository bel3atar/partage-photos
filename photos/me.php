<?php require_once('../header.php');
$photos = $db->prepare('SELECT u.nom as username, p.* FROM photos p JOIN users u ON p.user_id = u.id WHERE u.id = ?');
$photos->execute([sess_get('uid')]); ?>
<table>
	<?php while ($photo = $photos->fetch()): ?>
		<tr>
			<td><?= $photo['label'] ?></td>
			<td><?= $photo['username'] ?></td>
			<td>
				<?php if (strpos($photo['type'], 'image') !== FALSE): ?>
					<img src='/photos/getphoto.php?id=<?= $photo['id'] ?>'>
				<?php else: ?>
					<video width="320" height="240" controls>
						<source src='/photos/getphoto.php?id=<?= $photo['id'] ?>' type=<?= $photo['type'] ?>>
						Votre navigateur ne supporte pas la balise video.
					</video>
				<?php endif ?>
			</td>
			<td>
				<?php if (sess_get('uid') == $photo['user_id']): ?>
					<a href=/photos/delete.php?id=<?= $photo['id'] ?>>Supprimer</a>
					<a href=/photos/modifier.php?id=<?= $photo['id'] ?>>Modifier</a>
				<?php endif ?>
			</td>
		</tr>
	<?php endwhile ?>
</table>
<?php require_once('../footer.php');
