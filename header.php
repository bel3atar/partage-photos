<?php require_once('boot.php');?>
<!DOCTYPE html>
<html lang="fr">
	<head>
<link rel="stylesheet" href="/css/styles.css">

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
      <ul class="nav navbar-nav">
        <li><a href="/photos/new.php">Ajouter photo</a></li>
        <li><a href="/photos/me.php">Mes photos</a></li>
      </ul>
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
