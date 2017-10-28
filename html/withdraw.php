<?php
        include("includes/steamauth.php");
        include("includes/userInfo.php");
        if (isset($_SESSION['steamid']))
        {
                $id = $_SESSION['steamid'];

        }
        else {
                header("Location: login.php");
        }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body background="img/background.jpeg">
		<?php require 'includes/navbar.php';?>
	</body>
</html>
