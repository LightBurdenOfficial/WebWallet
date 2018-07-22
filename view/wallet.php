<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<?php
if (!empty($error))
{
    echo "<div class='container'><p style='font-weight: bold;font-size:15px; color: red;text-align:center'>" . $error['message']; "</p></div>";
}
?>

<div class="container_fluid">
  <div class="row">

    <div class="col-md-6 col-sm-6">
              <?php echo "<span class='myspan1 input-group-addon'>".$lang['WALLET_BALANCE']; ?> <strong id="balance"><?php echo satoshitize($balance)." SPERO</span>"; ?></strong>
    </div>
<!-- LOGOUT -->
<form action="index.php" method="POST">
    <div class="col-md-6 col-sm-6 logout">
      <form>
          <input type="hidden" name="action" value="logout" />
          <button type="submit" class="btn btn-danger pull-right fa fa-sign-out"><?php echo " ".$lang['WALLET_LOGOUT']; ?></button>
      </form>
    </div>
    </form>
  </div>

<!-- HEADER --> 
  <div class="row">
    <div class="col-md-4 col-sm-2">
            <span class="fa fa-child"></span><?php echo "<span class='myspan1'> ".$lang['WALLET_HELLO']; ?>, <strong><?php echo $user_session."</span>"; ?></strong><span class='myspan1'>!</span>  <?php if ($admin) {?><strong><font color="red">[Admin]</font><?php }?></strong>
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
<br />
<p><strong><?php echo $lang['WALLET_USERLINKS']; ?></strong></p>
  <?php
}
?>
<!-- SECTION 2FA+SUPPORT -->

<div class="row" style="text-align: center;">
<p>
<br /><br />
<strong class="fa fa-lock"><?php echo $lang['WALLET_PROTECT']; ?></strong>
<center><!-- ENABLE 2FA -->
<div class="col-sm-4 col-md-4 col-sm-4">
<form action="index.php" method="POST">
<form>
<input type="hidden" name="action" value="authgen" />
<button type="submit" class="btn btn-success btn-block fa fa-lock"><?php echo " ".$lang['WALLET_2FAON']; ?></button>
</form>
</div>
  <!-- DISABEL 2FA -->
  <div class="col-sm-4 col-md-4">
<form action="index.php" method="post">
<form>
<input type="hidden" name="action" value="disauth" />
<button type="submit" class="btn btn-danger btn-block fa fa-unlock"><?php echo " ".$lang['WALLET_2FAOFF']; ?></button>
</form>
</div>
<!-- SUPORT -->
<div class="col-sm-4 col-md-4">
<form action="index.php" method="POST">
<input type="hidden" name="action" value="support" action="index.php"/>
<button type="submit" class="btn btn-info btn-block fa fa-support"><?php echo " ".$lang['WALLET_SUPPORT']; ?></button>
</form>
</div>
</div>
</p>
</center>
<!-- UPDATE YOUR PASS -->
<br />
<div class="row" style="text-align: center;">
<p>
  <strong class="fa fa-edit"><?php echo $lang['WALLET_PASSUPDATE']; ?></strong>
</p>
<center>
<form action="index.php" method="POST" class="clearfix" id="pwdform">
    <input type="hidden" name="action" value="password" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
  <div class="row">
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
  <br>
  <div class="row">
    <!-- BUTTON CONFIRM -->
    <div class="col-md-12">
      <button type="submit" class="btn btn-success btn-block fa fa-key"><?php echo " ".$lang['WALLET_PASSUPDATECONF']; ?></button>
    </div>
   </div> 
</form>
</div>
</center>
<!-- SUPPORT MESSAGE -->
<center><p id="pwdmsg"></p>
<br />
<p style="font-size:1em;"><?php echo $lang['WALLET_SUPPORTNOTE']; ?></p>
<br />
</center>

<!-- SEND FOUNDS -->
<div class="row" style="text-align: center;">
<p>
  <strong class="fa fa-send"><?php echo $lang['WALLET_SEND']; ?></strong>
</p>
  <div class="row">
<center>
<div class="col-md-12 col-sm-12">
<button type="button" class="btn btn-info fa fa-money" id="donate"> Donate to <?=$fullname?> wallet's owner!</button><br />
</div>
<div class="col-md-12 col-sm-12">
<p id="donateinfo" style="display: none;">Type the amount you want to donate and click <strong>Withdraw</strong></p>
</div>
<div class="container">
  <div class="row">
<form action="index.php" method="POST" class="clearfix" id="withdrawform">
    <input type="hidden" name="action" value="withdraw" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"><br>
    <div class="col-md-6">
      <input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>" value="<?= $_GET['codigo'] ?>">
    <a href="http://zxing.appspot.com/scan?ret=https://sperocoin.ddns.net/webwallet/index.php?codigo={CODE}">QRCODE</a></div>
    <div class="col-md-6"><input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>"></div>
</div>
<div class="row" style="padding-top: 2%">
    <div class="col-md-12"><button type="submit" class="btn btn-success btn-block fa fa-send-o"><?php echo " ".$lang['WALLET_SENDCONF']; ?></button></div>
</form>
  </div>
</div>
<p id="withdrawmsg"></p>
<br />
  </div>
</div>
</center>

<!-- NEW ADDRESS -->
<div class="row">
  <center>
<p>
  <strong class="fa fa-address-card"><?php echo $lang['WALLET_USERADDRESSES']; ?></strong>
</p>
<form action="index.php" method="POST" id="newaddressform">
	<input type="hidden" name="action" value="new_address" />
	<button type="submit" class="btn btn-success btn-block fa fa-drivers-license-o"><?php echo " ".$lang['WALLET_NEWADDRESS']; ?></button>
</form>
<p id="newaddressmsg"></p>
<br />
<!-- ADDRESS TABLE-->
<div class="table-responsive">
<table class="table table-bordered table-striped" id="alist">
<thead>
<tr>
<td><?php echo $lang['WALLET_ADDRESS']; ?>:</td>
<td><?php echo $lang['WALLET_QRCODE']; ?>:</td>
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
</center>


<!-- LAST 10 TRANSACTIONS -->
<p class="fa fa-book"><?php echo $lang['WALLET_LAST10']; ?></p>
<div class="table-responsive">
<table class="table table-bordered table-hover" id="txlist">
<thead>
   <tr>
      <td nowrap><?php echo $lang['WALLET_DATE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_ADDRESS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_TYPE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_AMOUNT']; ?></td>
      <td nowrap><?php echo $lang['WALLET_FEE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_CONFS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_INFO']; ?></td>
   </tr>
</thead>
<tbody>
   <?php
   $bold_txxs = "";
   foreach($transactionList as $transaction) {
      if($transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else { $tx_type = '<b style="color: #01DF01;">Received</b>'; }
      echo '<tr>
               <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
               <td>'.$transaction['address'].'</td>
               <td>'.$tx_type.'</td>
               <td>'.abs($transaction['amount']).'</td>
               <td>'.$transaction['fee'].'</td>
               <td>'.$transaction['confirmations'].'</td>
               <td><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
            </tr>';
   }
   ?>
   </tbody>
</table>
</div>


<script type="text/javascript">
var blockchain_url = "<?=$blockchain_url?>";
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
               <td>' + json.transactionList[i]['fee'] + '</td> \
               <td>' + json.transactionList[i]['confirmations'] + '</td> \
               <td><a href="' + blockchain_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
	}
}
</script>
</div>