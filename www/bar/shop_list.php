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
			
	</script>
</head>
<body>
<? include_once('./header_inc.php');?>
<? include_once('./header.php');?>

	<header class="shop_nav">
		<nav class="n1">
			<div class="swiper-container">
				<ul class="swiper-wrapper">
					<li class="swiper-slide"><a href="javascript:newlist(0,0);" <?php if($c1 == "" || $c1 == "0") echo "class='on'"; ?>><span></span>전체</a></li>
					<li class="swiper-slide"><a href="javascript:newlist(51,0);" <?php if($c1 == "51") echo "class='on'"; ?>><span></span>주점</a></li>
					        
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
	$where .= " and is_giveaway=1 ";
}

if($lon!="" && $lat!= "")
{
	$where2 = " and lon>$lon-0.1 and lon<$lon+0.1 and lat>$lat-0.1 and lat<$lat+0.1 ";
	$where .= $where2;

	$dist =",(round((acos(cos(radians(90-$lat))*cos(radians(90-lat))+sin(radians(90-$lat))*sin(radians(90-lat))*cos(radians($lon-lon)))*6371000), 0)) AS distance ";
	$dist_sort = " distance ";
	$dist_sort = " is_giveaway desc, modify_date desc, distance ";

}
else
	$dist_sort = " is_giveaway desc, modify_date desc ";
$sql = "select id,name,cate,cate_sub,img0,img_id,lat,lon,eva_point,eva_count,order_tel_st,order_sms_st,regular_count ".$dist." from t_comp ".$where." order by ".$dist_sort."  limit 10";
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
				<a href="shop_detail.php?id=<?=$row['id']?>&c1=<?=$c1?>&c2=<?=$c2?>"  target="_blank"->
				
					<div class="d1" ><img src="<?=$img_str?>" alt="" height="75"><!--span>단골</span--></div>
					<dl>
						<dt>
							<p class="tit"><?=$row['name']?></p>
							<p class="eval">
	<?
$icon_p = floor($row[eva_point]);
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
							<p class="distance"><?=number_format($row[distance])?>m</p>
							<p class="favor"><?=$row['regular_count']?></p>
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

  var listcount=0; 
  var x1=<?=$c1?>;
  var x2=<?=$c2?>;
    var psel = 0;

  function addlist(){ 
        listcount+=10; 
        $.post("/get_shop_list.php",{"count" : listcount,"c1" : x1,"c2" : x2},function(data){ 
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
        $.post("/get_shop_list.php",{"count" : listcount,"c1" : c1,"c2" : c2},function(data){ 
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
        $.post("/get_shop_list.php",{"count" : listcount,"c1" : c1,"c2" : c2},function(data){ 
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