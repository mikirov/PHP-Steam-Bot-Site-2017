<?php require 'testsession.php'; ?>
<?php require 'navbar.php'; ?>
<?php
	$app = 730;
	$url = $steamprofile['profileurl']."/inventory/json/" . $app . "/2/";
	$res = file_get_contents($url);
	$data = json_decode($res, true);
	$items =  $data["rgDescriptions"];
	$trade= $data["rgInventory"];
	$keys=array_keys($items);
	$keys2=array_keys($trade);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body background="img/background.jpeg">
		  <div class="container text-center">
		    <h1><p style="color:white;">Deposit items</p></h1>
			<form class="" action="deposit.php" method="post">
				<button type="button" class="btn btn-info">Deposit Selected</button>
			</form>
			<br><br>
		  </div>
		<div class="flex-container">
			<?php for($i=0;$i<count($items);$i++){ ?>
			<?php $item = $items[$keys[$i]];?>
			<?php $assetid = $trade[$keys2[$i]];?>
			<?php if($item['tradable'] == 1){?>
			<div class="flex-item" id="<?php echo $assetid['id']?>" onclick="select(this.id);">
					<p style='color: white;'><?php echo $item['name'];?></p><br>
				 <img src='http://cdn.steamcommunity.com/economy/image/<?php echo $item['icon_url'];?>' />
			</div>
			<?php }} ?>
		</div>
		<script type="text/javascript">
			function select(id) {
				var el = document.getElementById(id);
				if(el.style.backgroundColor !== "grey"){
					el.style.backgroundColor="grey";
					el.style.border="none";

				}
				else{
					el.style.border="2px solid white";
					el.style.backgroundColor="LightGray";
				}
			}
		</script>
	</body>
</html>
