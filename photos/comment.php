<?php require_once('../boot.php');
$q = $db->prepare('INSERT INTO comments (comment, user_id, photo_id)
			VALUES(?, ?, ?)');
$q->execute([
	$_POST['comment'],
	sess_get('uid'),
	$_POST['photo']
]);
header("Location: /photos/show.php?id={$_POST['photo']}");
