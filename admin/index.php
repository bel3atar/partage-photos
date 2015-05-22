<?php require_once('../header.php'); 
	$q = $db->query('SELECT id, nom, login FROM users');
$q->execute();?>
<h1>Liste des utilisateurs</h1>
<table border=1>
	<thead>
		<th>Nom</th>
		<th>Nom d'utilisateur</th>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php while ($u = $q->fetch()): ?>
			<tr>
				<td><?= $u['nom'] ?></td>
				<td><?= $u['login'] ?></td>
				<td>
					<a href=/admin/delete_user.php?id=<?= $u['id'] ?>>Supprimer</a> | 
					<a href=/admin/edit_user.php?id=<?= $u['id'] ?>>Modifier</a>
				</td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>
<a href=/admin/new_user.php>Nouvel utilisateur</a>
<?php require_once('../footer.php'); 
