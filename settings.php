<?
$server_url = "http://localhost/";  // ENTER WEBSITE URL ALONG WITH A TRAILING SLASH

$db_host = "HOST";
$db_user = "USER";
$db_pass = "PASS";
$db_name = "DB_NAME";

$rpc_host = "HOST_WALLET";
$rpc_port = "PORT_WALLET";
$rpc_user = "USER_WALLET";
$rpc_pass = "PASS_WALLET";

$fullname = "SPERO"; //Website Title (Do Not include 'wallet')
$short = "SPERO"; //Coin Short (BTC)
$blockchain_tx_url = "http://52.67.138.144:3001/tx/"; //Blockchain Url
$support = "sperocoin@gmail.com"; //Your support eMail
$hide_ids = array(1); //Hide account from admin dashboard
$donation_address = "SiRvv6i8d5F7XbJSTqcGM35bdDMxATtMzz"; //Donation Address

$reserve = "0.1000"; //This fee acts as a reserve. The users balance will display as the balance in the daemon minus the reserve. We don't reccomend setting this more than the Fee the daemon charges.
//Recaptcha
$public = "PUBLIC_KEY";
$secret = "SECRET_KEY";
?>