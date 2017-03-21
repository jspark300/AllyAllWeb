<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="naver-site-verification" content="ce0f0f762a57b727a3d829741505d9dd08ce8948"/>
	<title>ALLYAll</title>
	<link href="a_css/default.css" rel="stylesheet" />
	<link href="a_css/common.css" rel="stylesheet" />
</head>
<body class="intro">
	<header class="header1">
		<div class="d1">
			<h1> </h1>
			<nav>
				<ul class="btn_wrap">
					<li><a href="search.php" class="search">검색</a></li>
					<li><a href="locate.php" class="locate">위치</a></li>
					<li><a href="my_index.php" class="menu">메뉴</a></li>
				</ul>
			</nav>
		</div>
		<div class="search_wrap1 dp_none">
			<p><input type="search" placeholder="검색어 입력"></p> <a href="#1">검색</a>
		</div>
	</header>

	
	<section class="s1">
		<h1><a href="shop_list.php"><img src="images/logo.png" alt="ALLYALL"></a></h1>
		
	</section>
	<!--section class="s2">
		<ul>
			<li><a href="shop_index.php"><span></span>업체정보</a></li>
			<li><a href="/shop/"><span></span>경품몰</a></li>
			<li><a href="mynotice.php"><span></span>커뮤니티</a></li>
		</ul>
	</section-->
	<section class="s3">
<?
include_once('./_common.php');

// 경품 있는경우.. 업데이트 최상단 노출
$t = time();
$sql = "update t_comp set modify_date=$t where is_giveaway=1";
$res = sql_query($sql);


$sql = "select count(id) s from t_comp";
$res = sql_fetch($sql);
$total = $res['s'];

// 경품수
$sql = "select count(id) c from t_give";
//echo $sql;
$res = sql_fetch($sql);
$give_count = $res['c'];

// 경품총액
$sql = "select sum(price) c from t_give";
$res = sql_fetch($sql);
$give_price = $res['c'];

// 당첨왕
$sql = "select mb_no, count(id) k, sum(price) p from t_give_enter where status>0 group by mb_no order by count(id) desc limit 1 ";
$res = sql_fetch($sql);
if($res)
{
//	$top_give_mb_no = $res[mb_no];
	$give_top_count = $res['k'];
	$give_top_price = $res['p'];
}
// 당첨자수
$sql = "select count(id) k from t_give_enter where status>0";
$res = sql_fetch($sql);
$give_lot_count = $res['k'];

// 기부자수
$sql = "select count(id) k from t_give_enter where status=5";
$res = sql_fetch($sql);
$give_gb_count = $res['k'];

// 기부자수
$sql = "select sum(price) k from t_give_enter where status=5";
$res = sql_fetch($sql);
$give_gb_price = $res['k'];

if ($is_member) {
	$nick = $member['mb_nick'];

?>
		<p><strong><?=$nick?>님! 언제나 즐거운일만 가득하길 바랍니다. </strong></p>
<?}
else
{
?>
		<!--p><strong>홍보에 도움을 드리고자 업체 등록은 무료입니다.</strong></p><br-->
		<p><img src="/images/txt_index.png"  alt="홍보에 도움을 드리고자 업체등록은 무료입니다." ></p>
<?}?>
		
	</section>
	<section class="s4">
		<p><strong>ALLYALL GIVEAWAY REPORT</strong></p>
		<ul>
			<li><span>업체수</span> <span><?=number_format($total)?>개</span></li>
			<li><span>경품수</span> <span><?=number_format($give_count)?>개</span></li>
			<li><span>경품총액</span> <span><?=number_format($give_price)?>원</span></li>
			<li><span>당첨왕</span> <span><?=number_format($give_top_count)?>회 <?=number_format($give_top_price)?></span></li>
			<li><span>당첨자수</span> <span><?=number_format($give_lot_count)?>명</span></li>
			<li><span>기부자수</span> <span><?=number_format($give_gb_count)?>명</span></li>
			<li><span>기부금액</span> <span><?=number_format($give_gb_price)?>원</span></li>
		</ul>
	</section>
<? if (!$is_member) { ?>
	<section class="s6">
		<ul>
			<li><span></span><a href="member_login.php">로그인</a></li>
			<li><span></span><a href="/shop_list.php">들어가기</a></li>
		</ul>
	</section>
<? } else { ?>
	<section class="s7">
		<ul>
			<li><span></span><a href="/shop_list.php">들어가기</a></li>
		</ul>
	</section>

<? } ?>
	
	<!--section class="btn_wrap_btm">
		<p class="txt">오늘 하루 열지 않음 <input type="checkbox"></p>
		<p class="btn_close"><a href="index.html">X</a></p>
	</section-->
	<? include_once('./footer.php');?>
</body>
</html>