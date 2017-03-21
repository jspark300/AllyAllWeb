<?php
include_once('./_common.php');
if(isset($_POST["Token"])) {
	$token = $_POST["Token"];
	
	$sql = "insert into b_fcm_users(Token) values ('$token')  ON DUPLICATE KEY UPDATE Token = '$token'; ";
	sql_query($sql);

}
echo "end";
?>