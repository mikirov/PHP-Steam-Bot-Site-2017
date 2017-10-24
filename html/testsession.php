<?php
	require 'steamauth/steamauth.php';
	require 'steamauth/userinfo.php';
	if (isset($_SESSION['steamid']))
	{
		$id = $_SESSION['steamid'];

	}
	else {
		header("Location: login.php");
	}
?>
