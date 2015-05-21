<?php
session_start();
function sess_get($k) {
	return isset($_SESSION[$k]) ? $_SESSION[$k] : null;
}
try {
	$db = new PDO('mysql:dbname=photos;host=127.0.0.1', 'root', '');
} catch (Exception $e) {
	echo 'Erreur de connexion à la base de données:', $e->getMessage();
}
if (sess_get('logged') == FALSE and !in_array($_SERVER['REQUEST_URI'], ['/register.php', '/login.php']))
	header("Location: /login.php");
