<?
include_once('./_common.php');
if (!$is_member) {
	echo "<script>alert('로그인이 필요합니다.');history.back();</script>";
	exit;
}

$sql="select * from t_comp where id='".$id."'";
$res = sql_fetch($sql);



?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ALLYAll</title>
	<link href="a_css/default.css" rel="stylesheet" />
	<link href="a_css/common.css" rel="stylesheet" />
	<script src="a_js/jquery-1.11.3.min.js"></script>
	<script src="a_js/common.js"></script>
		<script type="text/javascript" src="http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=4656599e5f320c8f90d2a7454368cfea"></script>

<script type="text/javascript">

	function send(sido) {
		sido = encodeURIComponent(sido);
		$.ajax({
			type:"GET",
			url:"/bada/address_ex.php?sido="+sido,
			data:"",
			dataType:'html',
			success:function(data){
				str = "<option value='' >구군선택" + data;
				document.getElementById('gugun').innerHTML = str;
				document.getElementById('dong').innerHTML = "<option value=''>동읍면선택";
			}
		});
	}

	function send2(sido,gugun) {

		sido = encodeURIComponent(sido);
		gugun = encodeURIComponent(gugun);
		$.ajax({
			type:"GET",
			url:"/bada/address_ex.php?sido="+sido+"&gugun="+gugun,
			data:"",
			dataType:'html',
			success:function(data){
				str = "<option value='' >동읍면선택" + data;
				document.getElementById('dong').innerHTML = str;
			}
		});

	}
	function send3(sido,gugun, dong) {

//		sido = encodeURIComponent(sido);
//		gugun = encodeURIComponent(gugun);
//		dong = encodeURIComponent(dong);
		document.getElementById('address').innerHTML = sido+" "+gugun+" "+dong;

	}
	function send_sel1(sel1) {
		sel1 = encodeURIComponent(sel1);
		$.ajax({
			type:"GET",
			url:"/bada/menu_ex.php?sel1="+sel1,
			data:"",
			dataType:'html',
			success:function(data){
				str = "<option value='' >2차선택" + data;
				document.getElementById('sel2').innerHTML = str;
			}
		});
	}
	function send_pop(pop) {
		pop = encodeURIComponent(pop);
		$.ajax({
			type:"GET",
			url:"/bada/pop_ex.php?pop="+pop,
			data:"",
			dataType:'html',
			success:function(data){
				str = "<option value='' >2차선택" + data;
				document.getElementById('pop2').innerHTML = str;
			}
		});
	}

	function send_sub(sub) {
		sub = encodeURIComponent(sub);
		$.ajax({
			type:"GET",
			url:"/bada/sub_ex.php?reg1="+sub,
			data:"",
			dataType:'html',
			success:function(data){
				str = "<option value='' >2차선택" + data;
				document.getElementById('sub2').innerHTML = str;
			}
		});
	}
	function send_sub2(sido,gugun) {

		sido = encodeURIComponent(sido);
		gugun = encodeURIComponent(gugun);
		$.ajax({
			type:"GET",
			url:"/bada/sub_ex.php?reg1="+sido+"&reg2="+gugun,
			data:"",
			dataType:'html',
			success:function(data){
				str = "<option value='' >3차선택" + data;
				document.getElementById('sub3').innerHTML = str;
			}
		});

	}
	function get_map(company,sido,gugun,dong,bungi) {
		company = encodeURIComponent(company);
		sido = encodeURIComponent(sido);
		gugun = encodeURIComponent(gugun);
		dong = encodeURIComponent(dong);
		bungi = encodeURIComponent(bungi);
		$.ajax({
			type:"GET",
			url:"/bada/addresstopoint.php?company="+company+"&sido="+sido+"&gugun="+gugun+"&dong="+dong+"&bungi="+bungi,
			data:"",
			dataType:'html',
			success:function(data){
				document.getElementById('d21').innerHTML = data;
			}
		});

	}
    function get_map_open(company,sido,gugun,dong,bungi) {
		company = encodeURIComponent(company);
		sido = encodeURIComponent(sido);
		gugun = encodeURIComponent(gugun);
		dong = encodeURIComponent(dong);
		bungi = encodeURIComponent(bungi);
        wi = window.open("/bada/addresstopoint.php?sido="+sido+"&gugun="+gugun+"&dong="+dong+"&bungi="+bungi+"&company="+company, "위치보기", "scrollbars=no,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,width=510,height=520");
        wi.focus();
    }

	function reg_shop()
	{
		document.getElementById("btn_submit").setAttribute("disabled","disabled");

		if(reg_com.sel1.value == "" || reg_com.sel2.value == "")
		{
			alert('업체구분을 선택해 주세요');
			document.getElementById('btn_submit').removeAttribute("disabled");
			return false;
		}
		if(reg_com.sido.value == "" || reg_com.gugun.value == "" || reg_com.dong.value == "")
		{
			alert('주소를 선택해 주세요');
		//	reg_com.sido.focus();
			return;
		}

		if(trim(reg_com.company.value) == "")
		{
			alert('업체명을 입력해 주세요');
			document.getElementById('btn_submit').removeAttribute("disabled");
			reg_com.company.focus();
			return false;
		}
<?if($id=="") { ?>
//		if(reg_com.img1.value == "" || reg_com.img2.value == "")
//		{
//			alert('이미지를 입력하세요');
//			reg_com.img1.focus();
//			return;
//		}
<?} ?>
//		if(reg_com.tel1.value == "" || reg_com.tel2.value == "" || reg_com.tel3.value == "")
//		{
//			alert('전화번호를 입력하세요');
//			reg_com.tel1.focus();
//			return;
//		}
//		if(reg_com.bungi.value == "")
//		{
//			alert('상세주소(지번)를 입력하세요');
//			reg_com.bungi.focus();
//			return;
//		}
//		if(reg_com.holiday.value == "")
//		{
//			alert('휴무를 입력하세요');
//			reg_com.holiday.focus();
//			return;
//		}
//		if(reg_com.description.value == "")
//		{
//			alert('업체소개를 입력하세요');
//			reg_com.description.focus();
//			return;
//		}
//		document.getElementById("btn_submit").disabled = true;
	//	$("#btn_submit").attr("disabled","disabled")
		//reg_com.submit();
//		document.getElementById("btn_submit").setAttribute("disabled","disabled");
		loading();
		return true;
	}

	function trim(str)
	{
		return str.replace(/^\s*|\s*$/g,"");
	}

	function change_business_hour()
	{
		if(document.reg_com.business_hour.checked == true)
		{
			document.reg_com.sdate.value = "00:00";
			document.reg_com.edate.value = "00:00";
			document.getElementById("s1").style.display = "none";
			document.getElementById("s2").style.display = "none";

		}
		else
		{
			document.getElementById("s1").style.display = "block";
			document.getElementById("s2").style.display = "block";
		}
	}
</script>

</head>
<body>
	<? //include_once('./header.php');?>
	<header class="header2">
		<div class="btn_back"><a href="javascript:history.back();"></a></div>
		<div class="txt_tit">
			<p>업체 <?if($id=="") echo "등록"; else echo "수정";?></p>
		</div>
	</header>
<form name="reg_com" method="post" charset="utf-8" action="reg_com_ok.php"   onsubmit="return reg_shop();"   enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="c1" value="<?=$c1?>">
<input type="hidden" name="c2" value="<?=$c2?>">
<input type="hidden" name="it_id" value="<?=$res[img_id]?>">
	<section class="member_wrap">
		<ul class="input_wrap">
			<li>
				<p class="tit_txt">● 업체명(필수)</p>
				<div class="input">
					<input type="text" name="company" placeholder="업체명 입력" value="<?=$res[name]?>" <?if($id!="") echo "readonly";?>>
				</div>
			</li>

			<li>
<?
$sel1 = $res[cate];
$sel2 = $res[cate_sub];
$sql="select m1,mstr1 from b_menu group by m1   order by m1";
$ba_result = sql_query($sql);
$str = "<option value selected>1차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[m1]==$sel1)
		$str .= "<option value='".$row['m1']."' selected>".$row['mstr1'];
	else
		$str .= "<option value='".$row['m1']."' >".$row['mstr1'];

}
$sql="select m2,mstr2 from b_menu where m1='$sel1'   order by m2";
$ba_result = sql_query($sql);
$str2 = "<option value selected>2차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[m2]==$sel2)
		$str2 .= "<option value='".$row['m2']."' selected>".$row['mstr2'];
	else
		$str2 .= "<option value='".$row['m2']."' >".$row['mstr2'];

}
	?>
				<p class="tit_txt">● 업체구분선택(필수)</p>
				<div class="input ymd">
					<span>
						<select name="sel1" id="sel1" onchange="send_sel1(this.value);">
							<?=$str?>
						</select>
					</span>
					<span>
						<select name="sel2" id="sel2">
							<?=$str2?>
						</select>
					</span>
				</div>
<?php
if($res[addr_s] != "")
{
	$add = explode(" ",$res[addr_s]);
	$sido = $add[0];

	$gugun = $add[1];
	$dong = $add[2];

	$s_len = strlen($sido.$gugun.$dong) + 3;
	$add_detail = substr($res[addr_s],$s_len);

	$sido = str_replace("특별시","",$sido);
	$sido = str_replace("광역시","",$sido);
	$sido = str_replace("시","",$sido);
	$sido = str_replace("도","",$sido);

//	$pattern = '(\d+)동';
//	$dong = preg_replace($pattern,"동",$dong);
}

$sql="select distinct reg1 from b_region order by reg1";
$ba_result = sql_query($sql);
$str = "<option value='' >시도선택";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg1]==$sido)
		$str .= "<option value='".$row['reg1']."' selected>".$row['reg1'];
	else
		$str .= "<option value='".$row['reg1']."' >".$row['reg1'];

}

$sql="select distinct reg2 from b_region where reg1='$sido' order by reg2";
$ba_result = sql_query($sql);
$str2 = "<option value='' >구군선택";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg2]==$gugun)
		$str2 .= "<option value='".$row['reg2']."' selected>".$row['reg2'];
	else
		$str2 .= "<option value='".$row['reg2']."' >".$row['reg2'];
}


$sql="select reg3 from b_region where reg1='$sido' and reg2='$gugun' order by reg3";
$ba_result = sql_query($sql);
$str3 = "<option value='' >동읍면선택";
while ($row=sql_fetch_array($ba_result)) {
	if(substr($row[reg3],0,2)==substr($dong,0,2))
		$str3 .= "<option value='".$row['reg3']."' selected>".$row['reg3'];
	else
		$str3 .= "<option value='".$row['reg3']."' >".$row['reg3'];
}
$str3 .= "";

?>
			</li>
			<li>

				<p class="tit_txt">● 주소선택</p>
				<div class="input ymd">
					<span>
						<select  name="sido" id="sido"  onchange="send(this.value);">
							<?=$str?>
						</select>
					</span>
					<span>
						<select  name="gugun" id="gugun" onchange='send2(sido.value,this.value);'>
							<?=$str2?>
						</select>
					</span>
					<span>
						<select  name="dong" id="dong" onchange="send3(sido.value,gugun.value,this.value);">
							<?=$str3?>
						</select>
					</span>
				</div>
			</li>

			<li>
				<p class="tit_txt">● 상세주소(지번주소)</p>
				<div class="input" id="address">

				</div>

				<div class="input">
					<p><input type="text" name="bungi" placeholder="예)123 강남빌딩1층" value="<?=$add_detail?>"></p>
					<!-- <a href="javascript:get_map_open(reg_com.company.value,sido.value,gugun.value,dong.value,reg_com.bungi.value);">지도보기</a> -->

				</div>
				<!--div class="d21" id="d21" style="margin:10px; height:200px;  border:#ccc solid 1px;">


				</div-->
			</li>

<?
$pop1 = $res[pop1];
$pop2 = $res[pop2];
$sql="select reg1 from b_region_pop group by reg1   ";
$ba_result = sql_query($sql);
$str = "<option value selected>1차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg1]==$pop1)
		$str .= "<option value='".$row['reg1']."' selected>".$row['reg1'];
	else
		$str .= "<option value='".$row['reg1']."' >".$row['reg1'];

}
$sql="select reg2 from b_region_pop where reg1='$pop1'   order by seq";
$ba_result = sql_query($sql);
$str2 = "<option value selected>2차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg2]==$pop2)
		$str2 .= "<option value='".$row['reg2']."' selected>".$row['reg2'];
	else
		$str2 .= "<option value='".$row['reg2']."' >".$row['reg2'];

}
?>
			<!--li>
				<p class="tit_txt">● 인기지역선택</p>
				<div class="input ymd">
					<span>
						<select  name="pop1" id="pop1"  onchange="send_pop(this.value);">
							<?=$str?>
						</select>
					</span>
					<span>
						<select  name="pop2" id="pop2">
							<?=$str2?>
						</select>
					</span>
				</div>
<?
$sub1 = $res[sub1];
$sub2 = $res[sub2];
$sub3 = $res[sub3];
$sql="select reg1 from b_region_sub group by reg1   ";
$ba_result = sql_query($sql);
$str = "<option value selected>1차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg1]==$sub1)
		$str .= "<option value='".$row['reg1']."' selected>".$row['reg1'];
	else
		$str .= "<option value='".$row['reg1']."' >".$row['reg1'];

}
$sql="select reg2 from b_region_sub where reg1='$sub1'   order by seq";
$ba_result = sql_query($sql);
$str2 = "<option value selected>2차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg2]==$sub2)
		$str2 .= "<option value='".$row['reg2']."' selected>".$row['reg2'];
	else
		$str2 .= "<option value='".$row['reg2']."' >".$row['reg2'];

}
$sql="select reg3 from b_region_sub where reg1='$sub1' and  reg2='$sub2'  order by seq";
$ba_result = sql_query($sql);
$str3 = "<option value selected>3차선택</option>";
while ($row=sql_fetch_array($ba_result)) {
	if($row[reg3]==$sub3)
		$str3 .= "<option value='".$row['reg3']."' selected>".$row['reg3'];
	else
		$str3 .= "<option value='".$row['reg3']."' >".$row['reg3'];

}
?>
			</li>
			<li>
				<p class="tit_txt">● 역세권선택</p>
				<div class="input ymd">
					<span>
						<select name="sub1" id="sub1"  onchange="send_sub(this.value);">
							<?=$str?>
						</select>
					</span>
					<span>
						<select name="sub2" id="sub2" onchange="send_sub2(sub1.value, this.value);">
							<?=$str2?>
						</select>
					</span>
					<span>
						<select name="sub3" id="sub3">
							<?=$str3?>
						</select>
					</span>
				</div>
			</li-->
			<li>
				<p class="tit_txt">● 이미지 등록</p>
				<div class="input">
					<span class="subtit">대표 이미지</span><p class="p1"><img src="<?="/data/shop/".$res['img_id']."/".$res['img1']?>" style="max-width:200px;"><input type="file" name="img1"></p>
				</div>
				<div class="input">
					<span class="subtit">소개 이미지</span><p class="p1"><img src="<?="/data/shop/".$res['img_id']."/".$res['img2']?>"  style="max-width:200px;"><input type="file" name="img2"></p>
				</div>
				<div class="input">
					<span class="subtit">소개 이미지</span><p class="p1"><img src="<?="/data/shop/".$res['img_id']."/".$res['img3']?>"  style="max-width:200px;"><input type="file" name="img3"></p>
				</div>
				<div class="input">
					<span class="subtit">소개 이미지</span><p class="p1"><img src="<?="/data/shop/".$res['img_id']."/".$res['img4']?>"  style="max-width:200px;"><input type="file" name="img4"></p>
				</div>
				<div class="input">
					<span class="subtit">소개 이미지</span><p class="p1"><img src="<?="/data/shop/".$res['img_id']."/".$res['img5']?>"  style="max-width:200px;"><input type="file" name="img5"></p>
				</div>
				<p class="exp">이미지는 가로 이미지로 등록해주세요.</p>
			</li>
			<li>

<?
$pho = explode("-",$res[phone]);
$tel1 = $pho[0];
$tel2 = $pho[1];
$tel3 = $pho[2];

?>
				<p class="tit_txt">● 전화번호</p>
				<div class="input tel">
					<span>
						<select name="tel1">
							<option value=""  <?if($tel1=="") echo "selected";?>>지역번호</option>
							<option value="02"  <?if($tel1=="02") echo "selected";?>>02</option>
							<option value="051" <?if($tel1=="051") echo "selected";?>>051</option>
							<option value="053" <?if($tel1=="053") echo "selected";?>>053</option>
							<option value="032" <?if($tel1=="032") echo "selected";?>>032</option>
							<option value="062" <?if($tel1=="062") echo "selected";?>>062</option>
							<option value="042" <?if($tel1=="042") echo "selected";?>>042</option>
							<option value="052" <?if($tel1=="052") echo "selected";?>>052</option>
							<option value="044" <?if($tel1=="044") echo "selected";?>>044</option>
							<option value="031" <?if($tel1=="031") echo "selected";?>>031</option>
							<option value="033" <?if($tel1=="033") echo "selected";?>>033</option>
							<option value="043" <?if($tel1=="043") echo "selected";?>>043</option>
							<option value="041" <?if($tel1=="041") echo "selected";?>>041</option>
							<option value="063" <?if($tel1=="063") echo "selected";?>>063</option>
							<option value="061" <?if($tel1=="061") echo "selected";?>>061</option>
							<option value="054" <?if($tel1=="054") echo "selected";?>>054</option>
							<option value="055" <?if($tel1=="055") echo "selected";?>>055</option>
							<option value="064" <?if($tel1=="064") echo "selected";?>>064</option>
							<option value="070" <?if($tel1=="070") echo "selected";?>>070</option>
							<option value="050" <?if($tel1=="050") echo "selected";?>>050</option>
							<option value="010" <?if($tel1=="010") echo "selected";?>>010</option>
							<option value="011" <?if($tel1=="011") echo "selected";?>>011</option>
							<option value="016" <?if($tel1=="016") echo "selected";?>>016</option>
							<option value="018" <?if($tel1=="018") echo "selected";?>>018</option>
							<option value="019" <?if($tel1=="019") echo "selected";?>>019</option>

						</select>
					</span>
					<span>
						<input type="tel" name="tel2" placeholder="앞자리" value="<?=$tel2?>">
					</span>
					<span>
						<input type="tel" name="tel3" placeholder="뒷자리" value="<?=$tel3?>">
					</span>
				</div>
			</li>
			<li>
				<p class="tit_txt">● 영업시간</p>
				<div class="input " style="padding-bottom:10px;">
					<span class="subtit">24시간</span>
					<p class="p1" >
						<input type="checkbox" name="business_hour" value="1" onchange="javascript:change_business_hour();" <? if($res[business_hour]=="1") echo "checked"; ?>>
					</p>
				</div>
				<div class="input ymd">
					<span class="subtit">개장</span>
					<p class="p1" id="s1" <? if($res[business_hour]=="1")  echo "style='display:none;'";?>>
						<select name="sdate">
							<option value="00:00" <?if($res[sdate]=="00:00") echo "selected";?>>00:00</option>
							<option value="01:00" <?if($res[sdate]=="01:00") echo "selected";?>>01:00</option>
							<option value="02:00" <?if($res[sdate]=="02:00") echo "selected";?>>02:00</option>
							<option value="03:00" <?if($res[sdate]=="03:00") echo "selected";?>>03:00</option>
							<option value="04:00" <?if($res[sdate]=="04:00") echo "selected";?>>04:00</option>
							<option value="05:00" <?if($res[sdate]=="05:00") echo "selected";?>>05:00</option>
							<option value="06:00" <?if($res[sdate]=="06:00") echo "selected";?>>06:00</option>
							<option value="07:00" <?if($res[sdate]=="07:00") echo "selected";?>>07:00</option>
							<option value="08:00" <?if($res[sdate]=="08:00") echo "selected";?>>08:00</option>
							<option value="09:00" <?if($res[sdate]=="09:00") echo "selected";?>>09:00</option>
							<option value="10:00" <?if($res[sdate]=="10:00") echo "selected";?>>10:00</option>
							<option value="11:00" <?if($res[sdate]=="11:00") echo "selected";?>>11:00</option>
							<option value="12:00" <?if($res[sdate]=="12:00") echo "selected";?>>12:00</option>
							<option value="13:00" <?if($res[sdate]=="13:00") echo "selected";?>>13:00</option>
							<option value="14:00" <?if($res[sdate]=="14:00") echo "selected";?>>14:00</option>
							<option value="15:00" <?if($res[sdate]=="15:00") echo "selected";?>>15:00</option>
							<option value="16:00" <?if($res[sdate]=="16:00") echo "selected";?>>16:00</option>
							<option value="17:00" <?if($res[sdate]=="17:00") echo "selected";?>>17:00</option>
							<option value="18:00" <?if($res[sdate]=="18:00") echo "selected";?>>18:00</option>
							<option value="19:00" <?if($res[sdate]=="19:00") echo "selected";?>>19:00</option>
							<option value="20:00" <?if($res[sdate]=="20:00") echo "selected";?>>20:00</option>
							<option value="21:00" <?if($res[sdate]=="21:00") echo "selected";?>>21:00</option>
							<option value="22:00" <?if($res[sdate]=="22:00") echo "selected";?>>22:00</option>
							<option value="23:00" <?if($res[sdate]=="23:00") echo "selected";?>>23:00</option>
						</select>
					</p>
				</div>
				<div class="input ymd">
					<span class="subtit">폐장</span>
					<p class="p1"  id="s2" <? if($res[business_hour]=="1")  echo "style='display:none;'";?>>
						<select name="edate">
							<option value="00:00" <?if($res[edate]=="00:00") echo "selected";?>>00:00</option>
							<option value="01:00" <?if($res[edate]=="01:00") echo "selected";?>>01:00</option>
							<option value="02:00" <?if($res[edate]=="02:00") echo "selected";?>>02:00</option>
							<option value="03:00" <?if($res[edate]=="03:00") echo "selected";?>>03:00</option>
							<option value="04:00" <?if($res[edate]=="04:00") echo "selected";?>>04:00</option>
							<option value="05:00" <?if($res[edate]=="05:00") echo "selected";?>>05:00</option>
							<option value="06:00" <?if($res[edate]=="06:00") echo "selected";?>>06:00</option>
							<option value="07:00" <?if($res[edate]=="07:00") echo "selected";?>>07:00</option>
							<option value="08:00" <?if($res[edate]=="08:00") echo "selected";?>>08:00</option>
							<option value="09:00" <?if($res[edate]=="09:00") echo "selected";?>>09:00</option>
							<option value="10:00" <?if($res[edate]=="10:00") echo "selected";?>>10:00</option>
							<option value="11:00" <?if($res[edate]=="11:00") echo "selected";?>>11:00</option>
							<option value="12:00" <?if($res[edate]=="12:00") echo "selected";?>>12:00</option>
							<option value="13:00" <?if($res[edate]=="13:00") echo "selected";?>>13:00</option>
							<option value="14:00" <?if($res[edate]=="14:00") echo "selected";?>>14:00</option>
							<option value="15:00" <?if($res[edate]=="15:00") echo "selected";?>>15:00</option>
							<option value="16:00" <?if($res[edate]=="16:00") echo "selected";?>>16:00</option>
							<option value="17:00" <?if($res[edate]=="17:00") echo "selected";?>>17:00</option>
							<option value="18:00" <?if($res[edate]=="18:00") echo "selected";?>>18:00</option>
							<option value="19:00" <?if($res[edate]=="19:00") echo "selected";?>>19:00</option>
							<option value="20:00" <?if($res[edate]=="20:00") echo "selected";?>>20:00</option>
							<option value="21:00" <?if($res[edate]=="21:00") echo "selected";?>>21:00</option>
							<option value="22:00" <?if($res[edate]=="22:00") echo "selected";?>>22:00</option>
							<option value="23:00" <?if($res[edate]=="23:00") echo "selected";?>>23:00</option>
						</select>
					</p>
				</div>
				<!--div class="input">
					<input type="text" name="" placeholder="기타">
				</div -->
			</li>
<?
if($res[holiday] != "")
{
	$hol = explode(" ",$res[holiday]);
	$holiday1 = $hol[0];
	$holiday2 = $hol[1];
}
?>

			<li>
				<p class="tit_txt">● 휴무</p>
				<div class="input tel">
					<span>
						<select name="holiday1">
								<option value="연중무휴" <?if($holiday1=="연중무휴") echo "selected";?>>연중무휴</option>
								<option value="매주" <?if($holiday1=="매주") echo "selected";?>>매주</option>
								<option value="격주" <?if($holiday1=="격주") echo "selected";?>>격주</option>
								<option value="한달" <?if($holiday1=="한달") echo "selected";?>>한달</option>
						</select>
					</span>
					<span>
						<select name="holiday2">
								<option value="" <?if($holiday2=="") echo "selected";?>>없음</option>
								<option value="월요일" <?if($holiday2=="월요일") echo "selected";?>>월요일</option>
								<option value="화요일" <?if($holiday2=="화요일") echo "selected";?>>화요일</option>
								<option value="수요일" <?if($holiday2=="수요일") echo "selected";?>>수요일</option>
								<option value="목요일" <?if($holiday2=="목요일") echo "selected";?>>목요일</option>
								<option value="금요일" <?if($holiday2=="금요일") echo "selected";?>>금요일</option>
								<option value="토요일" <?if($holiday2=="토요일") echo "selected";?>>토요일</option>
								<option value="일요일" <?if($holiday2=="일요일") echo "selected";?>>일요일</option>
						</select>

					</span>
				</div>
			</li>
			<li>
				<p class="tit_txt">● 업체소개</p>
				<div class="input">
					<textarea name="description"><?=$res[description]?></textarea>
				</div>
			</li>
			<li>
				<p class="tit_txt">● 홈페이지</p>
				<div class="input">
					<input type="text" name="homepage" placeholder="홈페이지(블로그)"  value="<?=$res[homepage]?>">
				</div>
			</li>
		</ul>
		<div class="btn1">
			<!--a href="javascript:reg_shop();">등록(수정) 신청</a --> <!-- 실제론 팝업으로 이동 -->
			<button type="submit" id="btn_submit" accesskey="s" class="btn1x"><i class="fa fa-check"></i> <b>작성완료</b></button>
			<a href="javascript:history.back();" class="btn btn-black btn-sm" role="button">취소</a>
		</div>
	</section>
	</form>

	<div id="divpop" style="width:100%; height:100%; position:absolute; left:150px; top:0px; z-index:1000; visibility:hidden;">

		<a href="javascript:closeWin();"><B><font face="굴림"><span style="font-size:9pt;">[닫기]</span></font></B></a>


	</div>

	<script language="JavaScript">
	<!--
 function openWin() {
	 document.all['divpop'].style.visibility = "visible";
 }

	function closeWin() {
	    document.all['divpop'].style.visibility = "hidden";
	}
	//-->
	</script>
</body>
</html>
