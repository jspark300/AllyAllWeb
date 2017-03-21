<?php
 
    $title = $_POST['title'];
    $message =$_POST['message']; 
    $regid = "Your API ID";
    // 헤더 부분
    $headers = array(
            'Content-Type:application/json',
            'Authorization:key=AIzaSyCyb9wXstU9kta1wAcJnkTvrzeFVbZ5cWs'
            );
  
    // 푸시 내용, data 부분을 자유롭게 사용해 클라이언트에서 분기할 수 있음.
    $arr = array();
    $arr['data'] = array();
    $arr['data']['title'] = $title;
    $arr['data']['message'] =$message;
    $arr['registration_ids'] = array();
    $arr['registration_ids'][0] = "Client(device) Token Id";
  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arr));
    $response = curl_exec($ch);
    curl_close($ch);
  
    // 푸시 전송 결과 반환.
    $obj = json_decode($response);
  
    // 푸시 전송시 성공 수량 반환.
    $cnt = $obj->{"success"};
  
    echo $cnt;
?>

