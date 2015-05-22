<?php require_once('boot.php');?>
<!DOCTYPE html>
<html lang="fr">
	<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<title>Partage photos</title> </head>
	<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/photos/index.php">Partage Photos</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if (sess_get('logged')): ?>
				<ul class="nav navbar-nav">
					<li><a href="/photos/new.php">Ajouter photo</a></li>
					<li><a href="/photos/me.php">Mes photos</a></li>
					<?php if (sess_get('nom') === 'admin'): ?>
						<li><a href="/admin">Utilisateurs</a></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>
      <ul class="nav navbar-nav navbar-right">
				<?php if (sess_get('logged')): ?>
					<li><a href="/profie.php"><?= $_SESSION['nom'] ?></a></li>
					<li><a href="/logout.php">Se déconnecter</a></li>
				<?php else: ?>
					<li><a href="/login.php">Se connecter</a></li>
				<?php endif ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		
		<?php if (isset($_SESSION['flash'])): ?>	
			<p class=bg-danger><?= $_SESSION['flash'] ?></p>
		<?php unset($_SESSION['flash']); endif; ?>
