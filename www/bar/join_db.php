<? 
include_once('./_common.php');
include_once(G5_LIB_PATH.'/register.lib.php');
include_once('./cate_table.php');

$sql = "select count(mb_no) c from g5_member where mb_id = '".$email."'";
$res = sql_fetch($sql);
$mb_count = $res['c'];
if($mb_count>0)
{	
	echo "<script>alert('이미 등록된 이메일입니다. 다른 이메일을 입력해 주세요.');history.back();</script>";
	exit;
}
$sql = "select count(mb_no) c from g5_member where mb_nick = '".$nicname."'";
$res = sql_fetch($sql);
$mb_count = $res['c'];
if($mb_count>0)
{	
	echo "<script>alert('이미 등록된 닉네임입니다. 다른 닉네임을 입력해 주세요.');history.back();</script>";
	exit;
}
$ip = $_SERVER["REMOTE_ADDR"];

$x = date("Y-m-d");

$sql = "insert into g5_member (mb_id,mb_password,mb_nick,mb_name,mb_email,mb_level,mb_datetime,mb_ip,mb_nick_date) values ('".$email."',password('".$userpass."'),'".$nicname."','".$nicname."','".$email."',2,now(),'".$ip."','".$x."')";
sql_query($sql);

$sql = "select mb_no from g5_member where mb_id='$email'";
$rs_mb = sql_fetch($sql);
$mb_no = $rs_mb[mb_no];
$t = time();
$sql = "insert into t_give_point_use (point_name,point_use,point,status,mb_no,reg_date) values ('회원가입','',10,1,'".$mb_no."',$t)";
sql_query($sql);

?> 
<script>
	top.location.href="/";
</script>
