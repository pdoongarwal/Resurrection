<?php

$coder1="MayankPratap";
$url="http://codeforces.com/api/user.info?handles=".$coder1;
$proxy='172.31.102.14:3128';
$proxyauth='edcguest:edcguest';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch,CURLOPT_PROXY,$proxy);
curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);  //getting the response from the site in JSON format
curl_close($ch);

$response=json_decode($response,true);  //converting it to PHP friendly format
//values for coder1
if($response['status']!="OK")
{
  echo "INVALID USERNAME ".$coder1;
   die();
}
$response=$response['result'];
$response=$response[0];
//echo $another[0]['handle'];
$handle1=$response['handle'];
$country1=$response['country'];
$organization1=$response['organization'];
$rank1=$response['rank'];
$rating1=$response['rating'];
$maxrank1=$response['maxRank'];
$maxrating1=$response['maxRating'];
$name1=$response['firstName'];
$name1=$name1." ";
$name1.=$response['lastName'];
$contribution1=$response['contribution'];
$registartionTimeSeconds1=$response['registrationTimeSeconds'];



$coder2="shark_s";
$url="http://codeforces.com/api/user.info?handles=".$coder2;
$proxy='172.31.102.14:3128';
$proxyauth='edcguest:edcguest';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch,CURLOPT_PROXY,$proxy);
curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);  //getting the response from the site in JSON format
curl_close($ch);

$response=json_decode($response,true);  //converting it to PHP friendly format
//values for coder1
if($response['status']!="OK")
{
  echo "INVALID USERNAME ".$coder2;
   die();
}
$response=$response['result'];
$response=$response[0];
//echo $another[0]['handle'];
$handle2=$response['handle'];
$country2=$response['country'];
$organization2=$response['organization'];
$rank2=$response['rank'];
$rating2=$response['rating'];
$maxrank2=$response['maxRank'];
$maxrating2=$response['maxRating'];
$name2=$response['firstName'];
$name2=$name2." ";
$name2.=$response['lastName'];
$contribution2=$response['contribution'];
$registartionTimeSeconds2=$response['registrationTimeSeconds'];

?>