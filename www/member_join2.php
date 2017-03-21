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
<script>
<!--
function checkNic(){
	f = document.Frm;
	if(f.nicname.value == "" )
	{
		alert("닉네임을 입력해 주세요.");
		return;
	}
	f.action="/checknic.php"
	f.target = "FrmHid";
	f.submit();
}
function checkEmail(){
	f = document.Frm;
	if(f.email.value == "" )
	{
		alert("이메일을 입력해 주세요.");
		return;
	}
	f.action="/checkemail.php"
	f.target = "FrmHid";
	f.submit();
}
function gosave(){
	f = document.Frm;
	if(!f.nicname.value){
		alert("닉네임을 입력해 주세요");
		f.nicname.focus();
		return;
	}
	if(f.nicchk.value==""){
		alert("닉네임 중복확인체크를 해주세요");
		return;
	}
	
	if(!f.email.value){
		alert("이메일를 입력해 주세요");
		f.email.focus();
		return;
	}
	if(f.emailchk.value==""){
		alert("이메일 중복확인체크를 해주세요");
		return;
	}
	if(!f.userpass.value){
		alert("비밀번호를 입력해 주세요");
		f.userpass.focus();
		return;
	}
	if(f.userpass.value.length<4){
		alert("비밀번호를 4자 이상 입력해 주세요");
		f.userpass.focus();
		return;
	}
	if(!f.repass.value){
		alert("비밀번호 확인을 입력해 주세요");
		f.repass.focus();
		return;
	}
	if (f.userpass.value!=f.repass.value){
		alert("비밀번호 확인이 맞지 않습니다.");
		f.userpass.focus();
		return;
	}
	
	
	if(f.c1.checked!=true){
		alert("위치기반 서비스 이용약관에 동의 해주세요.");
		return;
	}
	if(f.c2.checked!=true){
		alert("개인정보 수집 및 이용에 동의 해주세요.");
		return;
	}

	f.action = "join_db.php";
	f.target="";
	f.submit();
}
//-->
</script>
</head>

<body>
	<header class="header2">
		<div class="btn_back"><a href="member_login.php"></a></div>
		<div class="txt_tit">
			<p>회원가입</p>
		</div>
	</header>
	<section class="member_wrap">
<form name="Frm" method="post" action="cjoin_db.asp">
						<input type="hidden" name="username" />
					      <input type="hidden" name="birthday" />
						  <input type="hidden" name="agecheck" />
					      <input type="hidden" name="nation" />
					      <input type="hidden" name="phoneNo" />
						<input type="hidden" name="idchk">
						<input type="hidden" name="nicchk">
						<input type="hidden" name="emailchk">
						<input type="hidden" name="CI" value="" />
						<input type="hidden" name="userid" />
		<ul class="input_wrap">
			<li>
				<p class="tit_txt">● 닉네임 <span>(3~30자 이내, 공백불가능, 한글/숫자/영문 가능)</span></p>
				<div class="input">
					<p><input type="text"   name="nicname" placeholder="닉네임 입력"></p>
					<a href="#1"  onclick="javascript:checkNic();">중복확인</a>
				</div>
			</li>
			<li>
				<p class="tit_txt">● 이메일 <span>(비밀번호 찾기 시 이메일을 사용합니다. 올바른 이메일을 입력해 주세요. )</span></p>
				<div class="input">
					<p><input type="email" name="email" placeholder="이메일 입력"></p>
					<a href="#1"   onclick="javascript:checkEmail();">중복확인</a>
				</div>
			</li>
			<li>
				<p class="tit_txt">● 비밀번호</p>
				<div class="input">
					<input type="password" name="userpass" placeholder="4자 이상 숫자, 영문 입력">
				</div>
				<div class="input">
					<input type="password" name="repass" placeholder="비밀번호 확인 입력">
				</div>
			</li>
			</li>
			<!-- li>
				<p class="tit_txt">● 휴대폰 인증</p>
				<div class="input">
					<p><input type="tel" placeholder="휴대폰번호 입력"></p>
					<a href="#1">인증번호 발송</a>
				</div>
				<div class="input">
					<p><input type="password" placeholder="인증번호 입력"></p>
					<a href="#1">확인</a>
				</div>
			</li -->
			<!-- li>
				<p class="tit_txt">● 생년월일</p>
				<div class="input ymd">
					<span>
						<select>
							<option>1972년</option>
							<option>1973년</option>
							<option>1974년</option>
							<option>1975년</option>
							<option>1976년</option>
						</select>
						
					</span>
					<span>
						<select>
							<option>1월</option>
							<option>2월</option>
							<option>3월</option>
							<option>4월</option>
							<option>5월</option>
						</select>
						
					</span>
					<span>
						<select>
							<option>1일</option>
							<option>2일</option>
							<option>3일</option>
							<option>4일</option>
							<option>5일</option>
						</select>
						
					</span>
				</div>
			</li -->
			<li>
				<div class="input check">
					<p><input type="checkbox" name="c1" id="c1_1"><label for="c1_1"> 위치기반 서비스 이용약관에 동의</label></p>
					<a href="#1">내용보기</a>
				</div>
				<div class="input check">
					<p><input type="checkbox" name="c2" id="c1_2"><label for="c1_2"> 개인정보 수집 및 이용에 동의</label></p>
					<a href="#1">내용보기</a>
				</div>
			</li>
		</ul>
		
		<div class="btn1">
			<a href="javascript:gosave();">가입완료</a>
		</div>
</form>
	</section>
<iframe name="FrmHid" id="FrmHid" src="" width=0 height=0></iframe>
	
</body>
</html>