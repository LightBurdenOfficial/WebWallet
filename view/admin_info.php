<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<div class="container" style="padding-top: 5px;">
  <div class="row">
    <div class="col-md-12">
      <a href="?a=home"><button type="submit" class="btn btn-danger float-left"><i class="fas fa-sign-out-alt"></i> Admin Dashboard</button></a>
    </div>
  </div>
</div>
<?php
if (!empty($info) && is_array($info))
{
?>
<div class="container">
  <div class="row">
      <div class="col-md-12">
        <strong style="font-size: 20px;">User <strong><?php echo $info['username']; ?></strong>:</strong>
      </div>
  </div>
</div>
<div class="container">
<div class="table-responsive text-center">
      <table class="table table-hover table-dark" id="alist">
<thead>
   <tr>
      <td scope="col">Key</td>
      <td scope="col">Value</td>
   </tr>
</thead>
<tbody>
   <?php
   foreach($info as $key => $value) {
      echo '<tr>
               <td>' . $key . '</td>
               <td>' . $value . '</td>
            </tr>';
   }
   ?>
   </tbody>
</table>
</div>
</div>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <strong style="font-size: 20px;"> Set new password:</strong>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p> </p>
  </div>
</div>
<form action="<?php echo '?a=info&i=' . $info['id']; ?>" method="POST" autocomplete="off" class="clearfix text-center form-inline" id="pwdform">
    <input type="hidden" name="action" value="password" />
    <div class="col-md-6"><input type="password" class="form-control float-right" name="password" placeholder="New password"></div>
    <div class="col-md-6"><button type="submit" class="btn btn-success float-left">Change password</button></div>
</form>
<div class="row">
  <div class="col-md-12">
    <p id="pwdmsg"></p>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p></p>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <strong style="font-size: 20px;"> Withdraw funds:</strong>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p> </p>
  </div>
</div>
<form action="<?php echo '?a=info&i=' . $info['id']; ?>" method="POST" autocomplete="off" class="clearfix text-center form-inline" id="withdrawform">
    <input type="hidden" name="action" value="withdraw" />
    <div class="col-md-4"><input type="text" class="form-control" name="address" placeholder="Address"></div>
    <div class="col-md-4"><input type="text" class="form-control" name="amount" placeholder="Amount"></div>
    <div class="col-md-4"><button type="submit" class="btn btn-success">Withdraw</button></div>
</form>
<div class="row">
  <div class="col-md-12">
    <p id="withdrawmsg"></p>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p></p>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <strong style="font-size: 20px;"> Addresses:</strong>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p> </p>
  </div>
</div>
<form action="<?php echo '?a=info&i=' . $info['id']; ?>" method="POST" id="newaddressform">
   <input type="hidden" name="action" value="new_address" />
   <button type="submit" class="btn btn-info">Get a new address</button>
</form>
<div class="row">
  <div class="col-md-12">
    <p id="newaddressmsg"></p>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p> </p>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-dark" id="alist">
  <thead>
  <tr>
  <th scope="col">Address:</th>
  </tr>
  </thead>
  <tbody>
  <?php
  foreach ($addressList as $address)
  {
  echo "<tr><td>".$address."</td></tr>\n";
  }
  ?>
  </tbody>
  </table>
</div>
<div class="row">
  <div class="col-md-12">
    <strong style="font-size: 20px;"> Last 10 transactions:</strong>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p> </p>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-dark" id="txlist">
<thead>
   <tr>
      <th scope="col">Date</th>
      <th scope="col">Address</th>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      <th scope="col">Fee</th>
      <th scope="col">Confs</th>
      <th scope="col">Info</th>
   </tr>
</thead>
<tbody>
   <?php
   $bold_txxs = "";
   foreach($transactionList as $transaction) {
      if($transaction['category']=="send") { $tx_type = '<strong style="color: #FF0000;">Sent</strong>'; } else { $tx_type = '<strong style="color: #01DF01;">Received</strong>'; }
      echo '<tr>
               <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
               <td>'.$transaction['address'].'</td>
               <td>'.$tx_type.'</td>
               <td>'.abs($transaction['amount']).'</td>
               <td>'.$transaction['fee'].'</td>
               <td>'.$transaction['confirmations'].'</td>
               <td><a href="' . $blockchain_tx_url, $transaction['txid'] . '" target="_blank">Info</a></td>
            </tr>';
   }
   ?>
   </tbody>
</table>
<?php
} else {
   ?>
   <p style='font-weight: bold; color: red;'>User not found</p>
   <?php
}
?>
</div>
</div>


<script type="text/javascript">
var blockchain_tx_url = "<?=$blockchain_tx_url?>";
$("#withdrawform input[name='action']").first().attr("name", "jsaction");
$("#newaddressform input[name='action']").first().attr("name", "jsaction");
$("#pwdform input[name='action']").first().attr("name", "jsaction");
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
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //ugh, gtfo    
        }
    });
    e.preventDefault();
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
               <td><a href="' + blockchain_tx_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
   }
}
</script>
