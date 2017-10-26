<?php require 'testsession.php'; ?>
<html>
<head>
</head>
<body background="img/background.jpeg">
<?php require 'navbar.php'; ?>


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
