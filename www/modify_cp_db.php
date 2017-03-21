<?php
include_once('./_common.php');

if (!$is_member) {
	echo "<script>alert('로그인이 필요합니다.');history.back();</script>";
	exit;
}
$mb_id = $member['mb_id'];

$ts = date("Ymd");
$t = time();

if($mb_sms!="1")
	$mb_sms = "0";
	

$sql = "update g5_member set mb_tel = '".$tel."',mb_sms=$mb_sms where mb_id='$mb_id'";
sql_query($sql);

echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";
echo "<script>alert('휴대폰 번호를 변경하였습니다');location.href = '/my_index.php';</script>";
?>