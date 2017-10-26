<?php require 'testsession.php'; ?>
<?php require 'navbar.php'; ?>
<?php
$app = 730;
$url = $steamprofile['profileurl'] . "/inventory/json/" . $app . "/2/";
$res = file_get_contents($url);
$data = json_decode($res, true);
if(!$data){
    echo 'too many requests';
    die();
}
$items = $data["rgDescriptions"];
$trade = $data["rgInventory"];
$keys = array_keys($items);
$keys2 = array_keys($trade);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body background="img/background.jpeg">
<div class="container text-center">
    <h1 style="color:white;margin: 0 40px">Deposit items</h1>
    <form class="" action="deposit.php" method="post">
        <button type="button" class="btn btn-info">Deposit Selected</button>
    </form>
    <br><br>

<div class="flex-container">
    <?php for ($i = 0; $i < count($items); $i++) { ?>
        <?php $item = $items[$keys[$i]]; ?>
        <?php $assetid = $trade[$keys2[$i]]; ?>
        <?php if ($item['tradable'] == 1) { ?>
            <div class="unselected flex-item" id="<?php echo $assetid['id'] ?>" onclick="select(this.id);">
                <p class="text"><?php echo $item['name']; ?></p><br>
                <img src='http://cdn.steamcommunity.com/economy/image/<?php echo $item['icon_url']; ?>' class="img"/>
            </div>
        <?php }
    } ?>
</div>
</div>
<script type="text/javascript">
    function select(id) {
        var el = document.getElementById(id);

        if (el.classList.contains('unselected')) {
            el.classList.add('selected');
            el.classList.remove('unselected');
        } else {
            el.classList.remove('selected');
            el.classList.add('unselected');
        }
    }
</script>
</body>
</html>
