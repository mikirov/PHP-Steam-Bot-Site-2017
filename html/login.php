<?php
	require 'includes/steamauth.php';
	if(isset($_SESSION['steamid']))
	{
		 header("Location: /");
	}
?>
<!DOCTYPE html>
<html>

	<head>
	  <meta charset="utf-8">
	  <title>Shimonchick</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body background="img/background.jpeg" >
		<div class="col-sm-12">
			<input type="checkbox" id="agreeInput" value="on" >
			<label for="agreeInput" style="color:white;">I agree with the Terms of Service</label>
		</div>
		<a href='?login' onclick=" return checkterms()">
			<img src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_01.png">
		</a>
	</body>
	<script>
		function checkterms(){
			let el = document.getElementById("agreeInput").checked;
			if(el){
				return true;
			}
			else{
				alert("Please accept the terms of service");
				return false;
			}
		}
	</script>
</html>
