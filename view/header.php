<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<!DOCTYPE HTML>

<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<style type="text/css">
	body{
		font-family: 'Ubuntu', sans-serif;
	}
</style>
        <!-- End Bootstrap include stuff-->
        <title><?=$fullname?> Wallet </title>
        <link rel="shortcut icon" href="favicon.ico">
    </head>
<body  style="background-color: black; background-image: url(ao.gif);">
<div class="container bg-warning" style="padding-top: 5px;">

<nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="https://sperocoin.org/webwallet/view/wallet.png" width="60px"><span><?=$fullname?></span> WebWallet</a>
  <ul class="nav nav-pills">
		    <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		        Language
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="index.php?lang=en">ENG</a>
		        <a class="dropdown-item" href="index.php?lang=grc">GRC</a>
		        <a class="dropdown-item" href="index.php?lang=zho">ZHO</a>
		        <a class="dropdown-item" href="index.php?lang=ita">ITA</a>
		        <a class="dropdown-item" href="index.php?lang=por">PTBR</a>
		        <a class="dropdown-item" href="index.php?lang=hin">HIN</a>
		        <a class="dropdown-item" href="index.php?lang=spa">SPA</a>
		        <a class="dropdown-item" href="index.php?lang=tgl">TGL</a>
		        <a class="dropdown-item" href="index.php?lang=rus">RUS</a>
		        <a class="dropdown-item" href="index.php?lang=nld">NLD</a>
		        <a class="dropdown-item" href="index.php?lang=fra">FRA</a>
		        <a class="dropdown-item" href="index.php?lang=deu">DEU</a>
		        <a class="dropdown-item" href="index.php?lang=tur">TUR</a>
		        <a class="dropdown-item" href="index.php?lang=vie">VIE</a>
		        <a class="dropdown-item" href="index.php?lang=jpn">JPN</a>
		        <a class="dropdown-item" href="index.php?lang=kor">KOR</a>
		        <a class="dropdown-item" href="index.php?lang=ara">ARA</a>
		      </div>
		    </li>
  </ul>
</nav>
