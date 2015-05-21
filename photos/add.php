<?php require_once('../boot.php');
try {
	$q = $db->prepare('INSERT INTO photos (type, label, user_id, data) 
		VALUES (?, ?, ?, ?)');
	$q->bindParam(1, $_FILES['photo']['type']);
	$q->bindParam(2, $_POST['label']);
	$q->bindParam(3, $_SESSION['uid']);
	$q->bindParam(4, fopen($_FILES['photo']['tmp_name'], 'rb'), PDO::PARAM_LOB);
	$q->execute();
	header('Location: /photos/me.php');
} catch (Exception $e) {
	echo $e->getMessage();
}

