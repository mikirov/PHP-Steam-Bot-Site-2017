<?php require 'testsession.php'; ?>
<?php require 'navbar.php'; ?>
<?php
//load player inventory
$app = 730;
$url = $steamprofile['profileurl'] . "/inventory/json/" . $app . "/2/";
$res = file_get_contents($url);
$data = json_decode($res, true);
if(!$data){
	echo 'too many requests';
	die();
}
$items = $data['rgDescriptions'];
$trade = $data['rgInventory'];
$keys = array_keys($items);
$keys2 = array_keys($trade);
// get  all item prices;
require_once('otphp-master/lib/otphp.php');
$totp = new \OTPHP\TOTP("4VFZ6O7MGP5M2KFH");
$code = $totp->now();
$url2 = "https://bitskins.com/api/v1/get_all_item_prices/?api_key=46704883-70ef-411b-96df-94f0384a9bf3&code=".$code."&app_id=".$app;
$result = file_get_contents($url2);
$data2 = json_decode($result, true);
if(!$data2){
	echo "didnt work";
}
$prices = $data2['prices'];

// gets the price of a single item;
function getprice($name){
	$accepted = 0;
	foreach($GLOBALS["prices"] as $item){
		if($item['market_hash_name'] == $name){
			echo "{$item['price']}";
			$accepted = 1;
		}
	}
	if(!$accepted){
		echo "not accepted";
	}
}
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body background="img/background.jpeg">
<div class="container text-center" id="contents">
	<div>
		<h1 style="color:white;margin: 0 40px">Deposit items</h1>
		<button type="button" class="btn btn-info" id="deposit" onclick="deposit();">Deposit Selected</button>
	</div>
	<div class="flex-container">
		<?php for ($i = 0; $i < count($items); $i++) { ?>
			<?php $item = $items[$keys[$i]]; ?>
			<?php $assetid = $trade[$keys2[$i]]; ?>
			<?php if ($item['tradable'] == 1) { ?>
				<div class="unselected flex-item" id="<?php echo $assetid['id'] ?>" name="<?php echo $item['name'];?>" onclick="select(this.id);">
					<p class="text"><?php echo $item['market_hash_name']; ?></p><br>
					<img src='http://cdn.steamcommunity.com/economy/image/<?php echo $item['icon_url']; ?>' class="img"/>
					<?php getprice($item['market_hash_name']);?>
				</div>
			<?php }
		} ?>
	</div>
</div>
<script type="text/javascript" src="functions.js"></script>
</body>
</html>
