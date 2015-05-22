<?php require_once('header.php'); ?>
<form method=post action=check.php>
	<div class=form-group>
		<label for='login'>Nom d'utilisateur</label>
		<input class=form-control name=login id=login>
	</div>
	<div class=form-group>
		<label for='pass'>Mot de passe</label>
		<input class=form-control id=pass name=pass type=password>
	</div>
	<button type=submit class='btn'>Se connecter</button>
</form>
<?php require_once('footer.php');
