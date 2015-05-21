<?php require_once('../header.php');?>
<form method=post action=/photos/add.php enctype="multipart/form-data">
	<input type=file name=photo required>
	<textarea name=label placeholder=Description></textarea>
	<button type=submit>Ajouter</button>
</form>
<?php require_once('../footer.php');
