<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ALLYAll</title>
	<link href="a_css/default.css" rel="stylesheet">
	<link href="a_css/common.css" rel="stylesheet">
	<script src="a_js/jquery-1.11.3.min.js"></script>
	<script src="a_js/common.js"></script>
	<link rel="stylesheet" href="a_css/swiper.min.css">
	<script src="a_js/swiper.min.js"></script>
	<script src="a_js/jquery.bxslider.js"></script>
	<script>
	function pop_shop(id) {
				height = $(window).height();
				width = $(window).width();
				wi = window.open('/shop_detail.php?id='+id+'', '', 'scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,width='+width+',height='+height+'');
				//wi.focus();
			}
	function go_detail(id,c1,c2)
	{
		lc = listcount;
		var top  = window.pageYOffset || document.documentElement.scrollTop;
		location.href = "shop_detail.php?id="+id+"&c1="+c1+"&c2="+c2+"&lc="+lc+"&sc="+top+"&t=<?=time();?>";
	}			
	</script>
</head>
<body  onload="window.scrollTo(0,<?=$sc==""?0:$sc?>);">
<? include_once('./header_inc.php');?>
<? include_once('./header.php');?>
<?

if($c1=="")
	$c1 = 0;
if($c2=="")
	$c2 = 0;
?>
	<header class="shop_nav">
		<nav class="n1">
			<div class="swiper-container">
				<ul class="swiper-wrapper">
					<li class="swiper-slide"><a href="javascript:newlist(0,0);" <?php if($c1 == "" || $c1 == "0") echo "class='on'"; ?>><span></span>전체</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(1,0);" <?php if($c1 == "1") echo "class='on'"; ?>><span></span>배달음식</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(2,0);" <?php if($c1 == "2") echo "class='on'"; ?>><span></span>한식</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(3,0);" <?php if($c1 == "3") echo "class='on'"; ?>><span></span>중식</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(4,0);" <?php if($c1 == "4") echo "class='on'"; ?>><span></span>일식</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(5,0);" <?php if($c1 == "5") echo "class='on'"; ?>><span></span>양식</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(6,0);" <?php if($c1 == "6") echo "class='on'"; ?>><span></span>분식</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(7,0);" <?php if($c1 == "7") echo "class='on'"; ?>><span></span>부페</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(8,0);" <?php if($c1 == "8") echo "class='on'"; ?>><span></span>패스트푸드</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(9,0);" <?php if($c1 == "9") echo "class='on'"; ?>><span></span>카페</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(10,0);" <?php if($c1 == "10") echo "class='on'"; ?>><span></span>숙박</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(11,0);" <?php if($c1 == "11") echo "class='on'"; ?>><span></span>미용</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(12,0);" <?php if($c1 == "12") echo "class='on'"; ?>><span></span>건강</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(13,0);" <?php if($c1 == "13") echo "class='on'"; ?>><span></span>오락</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(14,0);" <?php if($c1 == "14") echo "class='on'"; ?>><span></span>취미</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(15,0);" <?php if($c1 == "15") echo "class='on'"; ?>><span></span>생활서비스</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(16,0);" <?php if($c1 == "16") echo "class='on'"; ?>><span></span>렌탈</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(17,0);" <?php if($c1 == "17") echo "class='on'"; ?>><span></span>웨딩</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(18,0);" <?php if($c1 == "18") echo "class='on'"; ?>><span></span>체험놀이</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(19,0);" <?php if($c1 == "19") echo "class='on'"; ?>><span></span>문화체험</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(20,0);" <?php if($c1 == "20") echo "class='on'"; ?>><span></span>학습학원</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(21,0);" <?php if($c1 == "21") echo "class='on'"; ?>><span></span>학원</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(22,0);" <?php if($c1 == "22") echo "class='on'"; ?>><span></span>주요기관</a></li>    
					<li class="swiper-slide"><a href="javascript:newlist(23,0);" <?php if($c1 == "23") echo "class='on'"; ?>><span></span>교통</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(24,0);" <?php if($c1 == "24") echo "class='on'"; ?>><span></span>여행</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(25,0);" <?php if($c1 == "25") echo "class='on'"; ?>><span></span>관광</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(26,0);" <?php if($c1 == "26") echo "class='on'"; ?>><span></span>명소</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(27,0);" <?php if($c1 == "27") echo "class='on'"; ?>><span></span>병원</a></li>		
					<li class="swiper-slide"><a href="javascript:newlist(28,0);" <?php if($c1 == "28") echo "class='on'"; ?>><span></span>인테리어</a></li>    		
					<li class="swiper-slide"><a href="javascript:newlist(29,0);" <?php if($c1 == "29") echo "class='on'"; ?>><span></span>공사/설비</a></li>   
					<li class="swiper-slide"><a href="javascript:newlist(30,0);" <?php if($c1 == "30") echo "class='on'"; ?>><span></span>농산물</a></li>      
					<li class="swiper-slide"><a href="javascript:newlist(31,0);" <?php if($c1 == "31") echo "class='on'"; ?>><span></span>축산물</a></li>      
					<li class="swiper-slide"><a href="javascript:newlist(32,0);" <?php if($c1 == "32") echo "class='on'"; ?>><span></span>수산물</a></li>      
					<li class="swiper-slide"><a href="javascript:newlist(33,0);" <?php if($c1 == "33") echo "class='on'"; ?>><span></span>가공물</a></li>      
					<li class="swiper-slide"><a href="javascript:newlist(34,0);" <?php if($c1 == "34") echo "class='on'"; ?>><span></span>건강식품</a></li>    
					<li class="swiper-slide"><a href="javascript:newlist(35,0);" <?php if($c1 == "35") echo "class='on'"; ?>><span></span>보석상</a></li>      
					<li class="swiper-slide"><a href="javascript:newlist(36,0);" <?php if($c1 == "36") echo "class='on'"; ?>><span></span>의류</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(37,0);" <?php if($c1 == "37") echo "class='on'"; ?>><span></span>패션</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(38,0);" <?php if($c1 == "38") echo "class='on'"; ?>><span></span>스포츠용품</a></li>  
					<li class="swiper-slide"><a href="javascript:newlist(39,0);" <?php if($c1 == "39") echo "class='on'"; ?>><span></span>아웃도어</a></li>    
					<li class="swiper-slide"><a href="javascript:newlist(40,0);" <?php if($c1 == "40") echo "class='on'"; ?>><span></span>가구점</a></li>      
					<li class="swiper-slide"><a href="javascript:newlist(41,0);" <?php if($c1 == "41") echo "class='on'"; ?>><span></span>주방</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(42,0);" <?php if($c1 == "42") echo "class='on'"; ?>><span></span>중고용품</a></li>    
					<li class="swiper-slide"><a href="javascript:newlist(43,0);" <?php if($c1 == "43") echo "class='on'"; ?>><span></span>전문서비스</a></li>  
					<li class="swiper-slide"><a href="javascript:newlist(44,0);" <?php if($c1 == "44") echo "class='on'"; ?>><span></span>문구</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(45,0);" <?php if($c1 == "45") echo "class='on'"; ?>><span></span>금융</a></li>        
					<li class="swiper-slide"><a href="javascript:newlist(46,0);" <?php if($c1 == "46") echo "class='on'"; ?>><span></span>간판</a></li>        
				</ul>																												 
				<div class="swiper-scrollbar"></div>
			</div>

		</nav>
		<nav class="n2">
					<div  class="swiper-container2">
						<ul class="swiper-wrapper" >
		<? if($c1==0 || $c1=="") { ?>				
							<li class="swiper-slide"><a href="javascript:newlist_sub(<?=$c1?>,0);"  <?php if($c2 == "" || $c2 == "0") echo "class='on'"; ?>><span></span>경품</a></li>
		<? } else { ?>
							<li class="swiper-slide"><a href="javascript:newlist_sub(<?=$c1?>,0);"  <?php if($c2 == "" || $c2 == "0") echo "class='on'"; ?>><span></span>전체</a></li>
		<? } ?>
		<?
		if($c1 == "")
			$c1 = 0;
		$sql = "select m2,mstr2 from b_menu where m1 = ".$c1." order by m2";
		$res = sql_query($sql);
		while ($row=sql_fetch_array($res)) {
			?>
							<li class="swiper-slide"><a href="javascript:newlist_sub(<?=$c1?>,<?=$row['m2']?>);"  <?php if($c2 == $row['m2'] ) echo "class='on'"; ?>><span></span><?=$row['mstr2']?></a></li>
		<? } ?>

						</ul>
					</div>

		</nav>

	
</header>
	<!--section class="shop_nav3">
		<nav class="n3">
			<div>
				<ul>
					<li><a href="#1" class="on">경품우선</a></li>
					<li><a href="#1">거리순</a></li>
					<li><a href="#1">추천순</a></li>
					<li><a href="#1">등록순</a></li>
					<li><a href="#1">최근검색</a></li>
				</ul>
			</div>
		</nav>
	</section -->
	<section class="shop_list">
		<ul  id="listbody">

<?
$where = " where 1";
if($c1>0)
{
//	if($c1 == 20)
//		$c1 = 19;
//	if($c1 == 25)
//		$c1 = 24;
//	if($c1 == 29)
//		$c1 = 14;
//	if($c1 == 38)
//		$c1 = 37;
	$where .= " and cate=".$c1;
	if($c2 != "" && $c2!="0")
		$where .= " and cate_sub='".$c2."'";
}
else if($c1==0 || $c1=="")
{
//	$where .= " and is_giveaway=1 ";
}

if($lon!="" && $lat!= "")
{
	$where2 = " and lon>$lon-0.1 and lon<$lon+0.1 and lat>$lat-0.1 and lat<$lat+0.1 ";
	$where .= $where2;

	$dist =",(round((acos(cos(radians(90-$lat))*cos(radians(90-lat))+sin(radians(90-$lat))*sin(radians(90-lat))*cos(radians($lon-lon)))*6371000), 0)) AS distance ";
	$dist_sort = " distance ";
	$dist_sort = " distance, modify_date desc ";

}
else
	$dist_sort = " modify_date desc ";

if($lc)
	$listcount = $lc+10;
else
	$listcount = 10;

$sql = "select id,name,cate,cate_sub,img0,img_id,lat,lon,eva_point,eva_count,order_tel_st,order_sms_st,view,regular_count ".$dist." from t_comp ".$where." order by ".$dist_sort."  limit ".$listcount."";
//echo "<br>".$sql;
$rx = sql_query($sql);
while ($row=sql_fetch_array($rx)) {
//	echo "xx";
	$cate = $row['cate'];
	if($row['img_id'] == "")
	{
		$img_str = "./img_shop_detail/".$cate."/".$cate."/".$row['cate_sub'].".jpg";
		if(!file_exists($img_str))
			$img_str = "/img_shop_detail/shop.png";
		}
	else
	{
		$img_str = "./data/shop/".$row[img_id]."/".$row['img0'];
	}
	if($row[order_tel_st]!="" || $row[order_sms_st]!="" )
		$order_st = "바로주문가능";
	else
		$order_st = "";

?>

			<li>
				<!-- a href="shop_detail.php?id=<?=$row['id']?>&c1=<?=$c1?>&c2=<?=$c2?>"  target="_blank"-->
				<a href="javascript:go_detail(<?=$row['id']?>,<?=$c1?>,<?=$c2?>);" >
					<div class="d1" ><img src="<?=$img_str?>" alt="" height="75"><!--span>단골</span--></div>
					<dl>
						<dt>
							<p class="tit"><?=$row['name']?></p>
							<p class="eval">
	<?
$icon_p = floor($row[eva_point]);

$sql = "select  call_count from t_call where com_id='".$row['id']."'";
//echo $sql;
$call = sql_fetch($sql);
if($call['call_count'] == "")
	$call_count = 0;
else
	$call_count = $call['call_count'];
?>						
								<span class="s1 e<?=$icon_p?>"><i></i><?=$row['eva_point']?>점</span>
								<!--span class="s2">						
									<strong>맛집</strong>
									<strong>친절</strong>
									<strong>청결</strong>
								</span-->
							</p>
						</dt>
						<dd>
							<p>거리 <?=number_format($row[distance])?>m, 단골 <?=$row['regular_count']?>, 조회 <?=$row['view']?>, 콜수 <?=$call_count?></p>
							<p><strong><?=$order_st?></strong></p>
						</dd>
					</dl>
<?if($c1<21) {?>

					
					<?
						// 경품존재여부
						$t = date("Ymd");
						$sql = "select id from t_give where com_id=$row[id] and start_date<=$t and end_date>=$t";
						$rs  = sql_fetch($sql);
						$sql = "select count(id) c from t_give_enter where give_id=$rs[id] and mb_no=$member[mb_no]";
						$rs_enter = sql_fetch($sql);
						if($rs && $rs_enter[c]>0)
						{
					?>
					<div class="d2 my">
						<img src="images/blt_intro_s4_1.png" alt="">
						<p>응모</p>
					</div>
					<? } else if($rs) { ?>
					<div class="d2 ing">
						<img src="images/blt_intro_s4_1.png" alt="">
						<p>경품 진행중</p>
					</div>
					<? } ?>					

<? } ?>
				</a>
			</li>
<?
}

if($c2=="")
	$c2 = 0;
?>

		</ul>
		<div class="btn_more"  id="lastlist"><a href="javascript:addlist();">더보기</a></div>
	</section>
</body>
<script> 
	var swiper2 = new Swiper('.swiper-container2', {
		initialSlide : <?=$c2-2?>,
		paginationClickable: true,
		spaceBetween: 2,
		freeMode: true,

		scrollbarHide: true,
		slidesPerView: 'auto',
		grabCursor: true
	});

	var swiper = new Swiper('.swiper-container', {
		initialSlide : <?=$c1-2?>,
		pagination: '.swiper-pagination',
		paginationClickable: true,
		spaceBetween: 2,
		freeMode: true,

		scrollbarHide: true,
		slidesPerView: 'auto',
		grabCursor: true
	});

  var listcount=<?=$lc==""?0:$lc?>; 
  var x1=<?=$c1?>;
  var x2=<?=$c2?>;
    var psel = 0;

  function addlist(){ 
        listcount+=10; 
        $.post("/get_shop_list.php",{"count" : listcount,"c1" : x1,"c2" : x2,"t":"<?=time();?>"},function(data){ 
              var oldlist =  $("#listbody").html(); 
 if(trim(data) != "0")
				$("#listbody").html(oldlist+data); 
			else
				$("#lastlist").html("<a href='javascript:addlist();'>마지막 목록입니다.</a>"); 
			
        });	
  } 
  
  function trim(str)
	{
		return str.replace(/^\s*|\s*$/g,"");
	}
  function newlist(c1,c2){ 
		x1 = c1;
		x2 = c2;
        listcount=0; 
		psel = 1;
		var strArray;
        $.post("/get_shop_list.php",{"count" : listcount,"c1" : c1,"c2" : c2,"t":"<?=time();?>"},function(data){ 
        //      var oldlist =  $("#listbody").html(); 
              $("#listbody").html(data); 
			   $("#lastlist").html("<a href='javascript:addlist();'>더보기</a>"); 
        });	
        $.post("/get_shop_submenuex.php",{"c1" : c1},function(data){ 
			strArray = data.split("|");
			
		swiper2.removeAllSlides();
		for(i=0; i<strArray.length; ++i)
		{
			if(i==0)
				swiper2.appendSlide('<li class="swiper-slide"><a href="javascript:newlist_sub('+c1+',0);" class="on" ><span></span>'+strArray[i]+'</a></li>');
			else
				swiper2.appendSlide('<li class="swiper-slide"><a href="javascript:newlist_sub('+c1+','+i+');"><span></span>'+strArray[i]+'</a></li>');
		}
		swiper2.update();
		   });	
  } 
  function newlist_sub(c1,c2){ 
		x1 = c1;
		x2 = c2;
		se = c2+1;
        listcount=0; 
        $.post("/get_shop_list.php",{"count" : listcount,"c1" : c1,"c2" : c2,"t":"<?=time();?>"},function(data){ 
        //      var oldlist =  $("#listbody").html(); 
              $("#listbody").html(data); 
			  $("#lastlist").html("<a href='javascript:addlist();'>더보기</a>"); 
        });	

		$(".shop_nav .n2 ul li:nth-child("+psel+") a").removeClass("on");
		$(".shop_nav .n2 ul li:nth-child("+se+") a").addClass("on");
		psel = se;
		
 //       $.post("/get_shop_submenu.php",{"c1" : c1,"c2" : c2},function(data){ 
  //      //      var oldlist =  $("#listbody").html(); 
    //          $("#submenubody").html(data); 
//			  
  //      });	
  } 
</script> 

</html>