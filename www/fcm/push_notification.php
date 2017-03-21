<?php
include_once('./_common.php');
define("GOOGLE_API_KEY", "AIzaSyAWIWyO-WXHwZaIgvqNJ42Ro9ZgTMFMpv0"); 


function send_notification($tokens, $message)
{
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields = array('registration_ids' => $tokens, 'data' => $message);
	$headers = array('Authorization:key ='. GOOGLE_API_KEY, 'Content-Type: application/json');

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);           
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

function send_notification_all($to, $message)
{
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields = array('to' => $to, 'data' => $message);
	$headers = array('Authorization:key ='. GOOGLE_API_KEY, 'Content-Type: application/json');

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);           
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}


$sql = "select Token from b_fcm_users";
$res = sql_query($sql);
$tokens = array();


while($row = sql_fetch_array($res))
{
	$tokens[] = $row["Token"];
}

$myMessage = $_POST['message'];
if($myMessage == "")
	$myMessage = "새글이 등록되었습니다.";
$to = "/topics/news";
$message = array("message" => $myMessage);
// $message_status = send_notification($tokens, $message);
$message_status = send_notification_all($to,$message);
echo $message_status;
?>