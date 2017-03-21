<?
include_once('./_common.php');
$where = " where 1 ";
if($c1>0)
{
	$where .= " and cate=".$c1;
	if($c2 != "0")
		$where .= " and cate_sub='".$c2."'";
}
else if($c1==0 || $c1=="")
{
	$where .= " and is_giveaway=1 ";
}
$start = $count;

$loc = $_COOKIE['location'];
if($loc != "")
{
	$loc = unescape($loc);
	$ar = explode("|",$loc);
	if(count($ar)==4)
	{
	$loc = "지역 : ".$ar[0];
	$lon = $ar[1];
	$lat = $ar[2];
//	echo $loc;
//	echo "lat:".$lat;
//	echo  "lon:".$lon;
	$where .= " and lon>$lon-0.1 and lon<$lon+0.1 and lat>$lat-0.1 and lat<$lat+0.1 ";
	}
}
function unescape($source)
{
    $decodedStr = '';
    $pos        = 0;
    $len        = strlen($source);
    while ($pos < $len) {
        $charAt = substr($source, $pos, 1);
        if ($charAt == '%') {
            $pos++;
            $charAt = substr($source, $pos, 1);
            if ($charAt == 'u') {
                // we got a unicode character
                $pos++;
                $unicodeHexVal = substr($source, $pos, 4);
                $unicode       = hexdec($unicodeHexVal);
                $entity        = '&#' . $unicode . ';';
                $decodedStr .= utf8_encode($entity);
                $pos += 4;
            }
            else {
                // we have an escaped ascii character
                $hexVal = substr($source, $pos, 2);
                $decodedStr .= chr(hexdec($hexVal));
                $pos += 2;
            }
        } else {
            $decodedStr .= $charAt;
            $pos++;
        }
    }
    return $decodedStr;
}
if($lon!="" && $lat!= "")
{
	$dist =",(round((acos(cos(radians(90-$lat))*cos(radians(90-lat))+sin(radians(90-$lat))*sin(radians(90-lat))*cos(radians($lon-lon)))*6371000), 0)) AS distance ";
	$dist_sort = " distance ";
	$dist_sort = "  is_giveaway desc, modify_date desc, distance ";
}
else
	$dist_sort = "  is_giveaway desc, modify_date desc ";

$sql = "select id,name,cate,cate_sub,img0,img_id,eva_point,eva_count,order_tel_st,order_sms_st,regular_count ".$dist." from t_comp ".$where." order by ".$dist_sort." limit ".$start.", 10";
//echo "<br>".$sql;
$res = sql_query($sql);
$i = 0;
while ($row=sql_fetch_array($res)) {
	++$i;
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
				<a href="shop_detail.php?id=<?=$row['id']?>&c1=<?=$c1?>&c2=<?=$c2?>"  target="_blank" >
				
					<div class="d1"><img src="<?=$img_str?>" alt=""  height="75"><!-- span>단골</span--></div>
					<dl>
						<dt>
							<p class="tit"><?=$row[name]?></p>
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
if($i==0 && $start>0)
	echo "0";

?>