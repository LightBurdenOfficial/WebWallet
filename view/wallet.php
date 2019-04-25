<?
include("consultas.php");
?><?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<?php
if (!empty($error))
{
    echo "<div class='container'><p style='font-weight: bold;font-size:15px; color: red;text-align:center'>" . $error['message']; "</p></div>";
}
?>

<div class="container" style="padding-top: 4px;">
	<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
		<strong><? echo $lang['WALLET_LG_BALANCE_WARNING']?></strong> <i class="fab fa-warning"> <? echo $lang['WALLET_LG_BALANCE_WARNING_2']?></i>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
<div class="container">
	<div class="row">
		 <div class="col-md-6 h2 col-sm-12">
			<span class="fa fa-child"></span><?php echo $lang['WALLET_HELLO']; ?>, <strong><?php echo $user_session; ?></strong>!
				<?php if ($admin) {?>
				<strong><font color="red">[Admin]</font>
				<?php }?></strong>
		</div>
		<div class="col-md-6 col-sm-12">
			<form action="index.php" method="POST">
		      <form>
		          <input type="hidden" name="action" value="logout" />
		          <button type="submit" class="btn btn-danger float-right"><i class="fas fa-sign-out-alt"></i> <?php echo " ".$lang['WALLET_LOGOUT']; ?></button>
		      </form>
			</form>
		</div>
	</div>
	<div class="row" style="padding-top: 5px;">
		<div class="col-md-3">
		<div class="card border-info mb-3 text-center" style="max-width: 18rem;min-height: 10em;">
		  <div class="card-header"><?php echo $lang['WALLET_BALANCE']; ?></div>
		  <div class="card-body text-info">
		    <p class="card-text" style="font-size: 20px;"><?php echo satoshitize($balance)."<br> SPERO"; ?></p>
		  </div>
		</div>
		</div>
		<div class="col-md-3 text-center">
		<div class="card border-info mb-3 text-center" style="max-width: 18rem; min-height: 10em;">
		  <div class="card-header"><?php echo "".$lang['WALLET_MONEY']; ?></div>
		  <div class="card-body text-success">
		    <p class="card-text">
		    	<?php echo "BTC: ".number_format($latest_price_spero_btc*satoshitize($balance), 8, '.', ','); ?><br>
		    	<?php echo "R$: ".number_format($latest_price_spero_brl*satoshitize($balance), 3, ',', '.'); ?><br>
		    	<?php echo "$: ".number_format($latest_price_spero_usd*satoshitize($balance), 3, ',', '.'); ?>
		    </p>
		  </div>
		</div>
		</div>
		<div class="col-md-3 text-center">
		<div class="card border-info mb-3" style="max-width: 18rem;min-height: 10em;">
		  <div class="card-header"><?php echo "".$lang['BLOCK_COUNT']; ?></div>
		  <div class="card-body text-warning">
		    <p class="card-text" style="font-size: 20px;padding-top: 10px"><?php echo $blocos; ?></p>
		  </div>
		</div>
		</div>
		<div class="col-md-3 text-center">
		<div class="card border-info mb-3" style="max-width: 18rem;min-height: 10em;">
		  <div class="card-header"><?php echo "".$lang['WALLET_INFO2']; ?></div>
		  <div class="card-body text-warning">
		    <p class="card-text" style="font-size: 12px;padding-top: 5px"><?php echo $lang['WALLET_VERSION'].": ".$walletVersion; ?><br>
		    	<?php echo $lang['WALLET_PROTOCOL'].": ".$protocolVersion; ?></p>
		  </div>
		</div>
		</div>
	</div>
</div>
<form action="index.php" method="POST">
<br />
<!-- ADMIN LINKS -->
<?php
if ($admin)
{
  ?>
<p><strong>Admin Links:</strong></p>
  <a href="?a=home" class="btn btn-info">Admin Dashboard</a>

<br />
<p><strong><?php echo $lang['WALLET_USERLINKS']; ?></strong></p>
  <?php
}
?>
<!-- SECTION 2FA+SUPPORT -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<strong style="font-size: 20px;"><i class="fas fa-shield-alt"></i> <?php echo $lang['WALLET_PROTECT']; ?></strong>
		</div>
	</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
	<div class="row">
		<div class="col-md-12 form-inline">
			<!-- ENABLE 2FA -->
			<div class="col-md-4">
				<form action="index.php" method="POST">
				<input type="hidden" name="action" value="authgen" />
				<button type="submit" class="btn btn-success btn-block"><i class="fas fa-lock"></i> <?php echo " ".$lang['WALLET_2FAON']; ?></button>
				</form>
			</div>
			  <!-- DISABEL 2FA -->
			<div class="col-md-4">
				<form action="index.php" method="post">
				<input type="hidden" name="action" value="disauth" />
				<button type="submit" class="btn btn-danger btn-block"><i class="fas fa-unlock-alt"></i> <?php echo " ".$lang['WALLET_2FAOFF']; ?></button>
				</form>
			</div>
			<!-- SUPORT -->
			<div class="col-md-4">
				<form action="index.php" method="POST">
				<input type="hidden" name="action" value="support" action="index.php"/>
				<button type="submit" class="btn btn-info btn-block"><i class="fas fa-robot"></i> <?php echo " ".$lang['WALLET_SUPPORT']; ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
<p></p>
<div class="container">
	<div class="row">
			<div class="col-md-12">
				<strong style="font-size: 20px;"><i class="fas fa-user-edit"></i> <?php echo $lang['WALLET_PASSUPDATE']; ?></strong>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p> </p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline text-center" action="index.php" method="POST" id="pwdform">
				<input type="hidden" name="action" value="password" />
				<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
					<!-- OLD PASSWORD -->
					<div class="col-md-4">
						<input type="password" class="form-control" name="oldpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATEOLD']; ?>">
					</div>
					<!-- NEW PASSWORD -->
					<div class="col-md-4">
						<input type="password" class="form-control" name="newpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEW']; ?>">
					</div>
					<!-- RE-NEW PASSWORD -->
					<div class="col-md-4">
						<input type="password" class="form-control" name="confirmpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEWCONF']; ?>">
					</div>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p> </p>
		</div>
	</div>
	<div class="row">
		<!-- BUTTON CONFIRM -->
		<div class="col-md-12 text-center">
			<button type="submit" class="btn btn-success btn-md fa fa-key"><?php echo " ".$lang['WALLET_PASSUPDATECONF']; ?></button>
		</div>
	</div> 
			</form>
</div>
<p></p>
<!-- SUPPORT MESSAGE -->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<p id="pwdmsg"></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<p style="font-size:1em;"><?php echo $lang['WALLET_SUPPORTNOTE']; ?></p>
		</div>
	</div>
</div>
<p></p>
<!-- SEND FOUNDS -->
<div class="container">
<div class="row">
	<div class="col-md-12">
		<strong style="font-size: 20px;"><i class="fas fa-random"></i> <?php echo $lang['WALLET_SEND']; ?></strong>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<button type="button" class="btn btn-info" id="donate"><i class="fas fa-donate"></i> Donate to <?=$fullname?> wallet's owner!</button>
		<p id="donateinfo" style="display: none;">Type the amount you want to donate and click <strong>Withdraw</strong></p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-inline text-center" action="index.php" method="POST"id="withdrawform">
			<input type="hidden" name="action" value="withdraw" />
			<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"><br>
				<div class="col-md-6">
					<input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>" value="<?= $_GET['codigo'] ?>">
					<a href="http://zxing.appspot.com/scan?ret=https://sperocoin.org/webwallet/index.php?codigo={CODE}"><button class="btn btn-primary"><i class="fas fa-qrcode"></i></button></a>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>">
				</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<button type="submit" class="btn btn-success btn"><i class="fas fa-random"></i> <?php echo " ".$lang['WALLET_SENDCONF']; ?></button>
	</div>
		</form>
</div>
<div class="row">
	<div class="col-md-12 text-center">
		<p id="withdrawmsg"></p>
	</div>
</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
<!-- NEW ADDRESS -->
<div class="container">
<div class="row">
	<div class="col-md-12">
		<strong style="font-size: 20px;"><i class="fas fa-address-card"></i> <?php echo $lang['WALLET_USERADDRESSES']; ?></strong>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
<form action="index.php" method="POST" id="newaddressform">
	<input type="hidden" name="action" value="new_address" />
	<button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> <?php echo " ".$lang['WALLET_NEWADDRESS']; ?></button>
</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p id="newaddressmsg"></p>
	</div>
</div>
</div>
<!-- ADDRESS TABLE-->
<div class="container">
	<div class="row">
		<div class="table-responsive text-center">
			<table class="table table-hover table-dark" id="alist">
			<thead>
				<tr>
				<th scope="col"><?php echo $lang['WALLET_ADDRESS']; ?></th>
				<th scope="col"><i class="fas fa-qrcode" style="font-size: 30px"></i></th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($addressList as $address)
				{
				echo "<tr><td>".$address."</t>";?>
				<td><a href="<?php echo $server_url;?>qrgen/?address=<?php echo $address;?>">
				  <img src="<?php echo $server_url;?>qrgen/?address=<?php echo $address;?>" alt="QR Code" style="width:42px;height:42px;border:0;"></td><tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- LAST 10 TRANSACTIONS -->
<div class="container">
<div class="row">
	<div class="col-md-12">
		<strong style="font-size: 20px;"><i class="fas fa-list-ol"></i> <?php echo $lang['WALLET_LAST10']; ?></strong>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p> </p>
	</div>
</div>
<div class="row">
	<div class="table-responsive text-center">
		<table class="table table-hover table-dark" id="txlist">
		<thead>
		   <tr>
		      <th scope="col"><?php echo $lang['WALLET_DATE']; ?></td>
		      <th scope="col"><?php echo $lang['WALLET_ADDRESS']; ?></td>
		      <th scope="col"><?php echo $lang['WALLET_TYPE']; ?></td>
		      <th scope="col"><?php echo $lang['WALLET_AMOUNT']; ?></td>
		      <th scope="col"><?php echo $lang['WALLET_FEE']; ?></td>
		      <th scope="col"><?php echo $lang['WALLET_CONFS']; ?></td>
		      <th scope="col"><?php echo $lang['WALLET_INFO']; ?></td>
		   </tr>
		</thead>
		<tbody>
		   <?php
		   $bold_txxs = "";
		   foreach($transactionList as $transaction) {
		      if($transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else { $tx_type = '<b style="color: #01DF01;">Received</b>'; }
		      echo '<tr>
		               <td>'.date('j/n/Y h:i a',$transaction['time']).'</td>
		               <td>'.$transaction['address'].'</td>
		               <td>'.$tx_type.'</td>
		               <td>'.abs($transaction['amount']).'</td>
		               <td>'.$transaction['fee'].'</td>
		               <td>'.$transaction['confirmations'].'</td>
		               <td><a href="' . $blockchain_tx_url,  $transaction['txid'] . '" target="_blank"><i class="fas fa-search-dollar" style="font-size: 20px; color: white"></i></a></td>
		            </tr>';
		   }
		   ?>
		   </tbody>
		</table>
	</div>
</div>
</div>

<script type="text/javascript">
var blockchain_tx_url = "<?=$blockchain_tx_url?>";
$("#withdrawform input[name='action']").first().attr("name", "jsaction");
$("#newaddressform input[name='action']").first().attr("name", "jsaction");
$("#pwdform input[name='action']").first().attr("name", "jsaction");
$("#donate").click(function (e){
  $("#donateinfo").show();
  $("#withdrawform input[name='address']").val("<?=$donation_address?>");
  $("#withdrawform input[name='amount']").val("0.01");
});
$("#withdrawform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
              $("#withdrawform input.form-control").val("");
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "green");
            	$("#withdrawmsg").show();
            	updateTables(json);
            } else {
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "red");
            	$("#withdrawmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
});
$("#newaddressform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "green");
            	$("#newaddressmsg").show();
            	updateTables(json);
            } else {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "red");
            	$("#newaddressmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
});
$("#pwdform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
               $("#pwdform input.form-control").val("");
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "green");
               $("#pwdmsg").show();
            } else {
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "red");
               $("#pwdmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
});

function updateTables(json)
{
	$("#balance").text(json.balance.toFixed(8));
	$("#alist tbody tr").remove();
	for (var i = json.addressList.length - 1; i >= 0; i--) {
		$("#alist tbody").prepend("<tr><td>" + json.addressList[i] + "</td></tr>");
	}
	$("#txlist tbody tr").remove();
	for (var i = json.transactionList.length - 1; i >= 0; i--) {
		var tx_type = '<b style="color: #01DF01;">Received</b>';
		if(json.transactionList[i]['category']=="send")
		{
			tx_type = '<b style="color: #FF0000;">Sent</b>';
		}
		$("#txlist tbody").prepend('<tr> \
               <td>' + moment(json.transactionList[i]['time'], "X").format('l hh:mm a') + '</td> \
               <td>' + json.transactionList[i]['address'] + '</td> \
               <td>' + tx_type + '</td> \
               <td>' + Math.abs(json.transactionList[i]['amount']) + '</td> \
               <td>' + (json.transactionList[i]['fee']?json.transactionList[i]['fee']:'') + '</td> \
               <td>' + json.transactionList[i]['confirmations'] + '</td> \
               <td><a href="' + blockchain_tx_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
	}
}
</script>
</div>