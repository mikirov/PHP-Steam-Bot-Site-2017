<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/my.css">

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="index.php">Shimonchick</a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
      		<ul class="nav navbar-nav">
        		<li><a href="index.php">Home</a></li>
        		<li><a href="deposit.php">Deposit</a></li>
        		<li><a href="withdraw.php">Withdraw</a></li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php"><img src="<?=$steamprofile['avatar'];?>"></a></li>
				<li class="dropdown">
          			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings</a>
          			<ul class="dropdown-menu">
            			<li><a href="#">Page 1-1</a></li>
            			<li><a href="#">Page 1-2</a></li>
            			<li><a href="logout.php">Logout</a></li>
          			</ul>
        		</li>
      		</ul>
    	</div>
  	</div>
</nav>
