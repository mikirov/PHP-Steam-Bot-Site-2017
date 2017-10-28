<?php
	require 'steamauth/steamauth.php';
	require 'steamauth/userinfo.php';
	$data = $_POST['assetids'];
	foreach($data as $d){
		echo "assetid received: $d \n";
	}
	$itemstring = implode(" ", $data);
	$command = "node bot.js {$steamprofile['steamid']} {$itemstring}";
	exec($command);
?>
