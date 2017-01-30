<?php
	session_start();
	unset($_SESSION['login_user']);
	unset($_SESSION['username']);
	unset($_SESSION['role']);
	session_destroy();

	header("Location: index.php");
	exit;
?>