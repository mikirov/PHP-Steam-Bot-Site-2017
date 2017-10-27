<?php include("userinfo.php"); ?>
<?php include("steamauth.php"); ?>
<html>
<head>
</head>
<body background="img/background.jpeg">
<?php include('navbar.php'); ?>
<div class="container">
    <h1 style="color:white;">profile info:</h1>
    <?php foreach ($steamprofile as $key => $value) { ?>
        <h4 style="color:white;">
            <?php echo "$key : $value"; ?>
        </h4>
    <?php } ?>

</div>

</body>
</html>
