<?php
if(!isset($_SESSION['id_utilisateur']) AND !isset($_SESSION['login'])){
	header("Location: /pages/login.php");
	exit();
	};


 ?>