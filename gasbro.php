<?php
///////////////////////////////////////////
///////CREATED BY ARUDJI HERMATYAR////////
//////www.facebook.com/bantalku567///////
/////https://github.com/arudji1211//////
///////////////////////////////////////

include 'request.php';

$tri = new tri();
$imei = "867889005326788";
echo "st4rs Masukkan No Telepon : ";
$msisdn = trim(fgets(STDIN));
$otp = $tri->request_otp($msisdn,$imei);
echo $otp[1] . "\r\n";
echo "Masukkan OTP : ";
$otp = trim(fgets(STDIN));
$login = $tri->login($msisdn,$otp);
$login = json_decode($login,true);
$bearer = $login['access_token'];
$id = $tri->trans($bearer);
$id = json_decode($id,true);
$id = $id['data'][23111802]['rewardTransactionId'];
for($id1 = 1500; $id1 < 1600;$id1++)
{
  $gas = $tri->claim($bearer,$id,$id1);
  echo $gas . "\r\n";
  sleep(2);
}


?>
