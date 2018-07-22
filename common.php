<?php
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);

session_start();
header('Cache-control: private'); // IE 6 FIX

define("WITHDRAWALS_ENABLED", true); //Disable withdrawals during maintenance

include('jsonRPCClient.php');
include('classes/Client.php');
include('classes/User.php');

// function by zelles to modify the number to bitcoin format ex. 0.00120000
function satoshitize($satoshitize) {
   return sprintf("%.8f", $satoshitize);
}

// function by zelles to trim trailing zeroes and decimal if need
function satoshitrim($satoshitrim) {
   return rtrim(rtrim($satoshitrim, "0"), ".");
}

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
$blockchain_url = "http://sperocoin.ddns.net:3001/tx/"; //Blockchain Url
$support = "sperocoin@gmail.com"; //Your support eMail
$hide_ids = array(1); //Hide account from admin dashboard
$donation_address = "SNuuzZpT9ejU8HMSKWYiK7cn3unCvVNf8m"; //Donation Address

$reserve = "0.0001"; //This fee acts as a reserve. The users balance will display as the balance in the daemon minus the reserve. We don't reccomend setting this more than the Fee the daemon charges.

if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];

// register the session and set the cookie
$_SESSION['lang'] = $lang;

setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}

switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;

  case 'grc':
  $lang_file = 'lang.grc.php';
  break;

  case 'zho':
  $lang_file = 'lang.zho.php';
  break;

  case 'ita':
  $lang_file = 'lang.ita.php';
  break;

  case 'por':
  $lang_file = 'lang.por.php';
  break;

  case 'hin':
  $lang_file = 'lang.hin.php';
  break;

  case 'spa':
  $lang_file = 'lang.spa.php';
  break;

  case 'tgl':
  $lang_file = 'lang.tgl.php';
  break;

  case 'rus':
  $lang_file = 'lang.rus.php';
  break;

  case 'nld':
  $lang_file = 'lang.nld.php';
  break;

  case 'fra':
  $lang_file = 'lang.fra.php';
  break;

  case 'deu':
  $lang_file = 'lang.deu.php';
  break;

  case 'tur':
  $lang_file = 'lang.tur.php';
  break;

  case 'vie':
  $lang_file = 'lang.vie.php';
  break;

  case 'jpn':
  $lang_file = 'lang.jpn.php';
  break;

  case 'kor':
  $lang_file = 'lang.kor.php';
  break;

  case 'ara':
  $lang_file = 'lang.ara.php';
  break;

  default:
  $lang_file = 'lang.en.php';

}

include_once 'languages/'.$lang_file;

?>
