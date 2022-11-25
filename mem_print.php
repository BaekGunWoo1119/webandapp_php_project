<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="mainWrapper">
  <header> 
    <!-- This is the header content. It contains Logo and links -->
	  <div id="logo"><a href = "index.php" target = "_self"><img src="logoImage.png" alt="sample logo"></a> 
	  </div>
    <div id="headerLinks"><a href="login.php" title="Cart">로그인/회원가입</a></div>
  </header>
  <section>
  	  <img src="Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
	<h2 style = text-align:center>▶ 회원정보 확인</h2>
	<center>
	<?php
		error_reporting(E_ALL);

		ini_set('display_errors', '1');
		include "/workspace/wnateam/db.php"; 

		$id = $_POST['id'];
		$name = $_POST['name'];
		$passwd = $_POST['passwd'];
		$passwd_confirm = $_POST['passwd_confirm'];
		$gender = isset($_POST['male']) ? "남성" : "여성";
		$userpms = isset($_POST['owner']) ? "사장" : "손님";
		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$phone3 = $_POST['phone3'];
		$address = $_POST['address'];
		$melo = isset($_POST['melo']) ? "yes" : "no";
		$book = isset($_POST['book']) ? "yes" : "no";
		$bar = isset($_POST['bar']) ? "yes" : "no";
		$brand = isset($_POST['brand']) ? "yes" : "no";
		$view = isset($_POST['view']) ? "yes" : "no";
		$theme = isset($_POST['theme']) ? "yes" : "no";
		$type = "";
		$intro = $_POST['intro'];

		echo <<<EOT
			<table border="1" width="640" cellspacing="1" cellpadding="4" >
			<colgroup>
				<col style="width:30%">
			</colgroup>
			<tr>
				<td align="right">아이디 :</td>
				<td>$id</td>
			</tr>
			<tr>
				<td align="right" >이름 :</td>
				<td>$name</td>
			</tr>
			<tr>
			<td align="right">비밀번호 :</td>
				<td>$passwd</td>
			</tr>
			<tr>
				<td align="right">성별 :</td>
				<td>$gender</td>
			</tr>
			<tr>
				<td align="right">회원분류 :</td>
				<td>$userpms</td>
			</tr>
			<tr>
				<td align="right">휴대전화 :</td>
				<td>$phone1 - $phone2 - $phone3</td>
			</tr>
			<tr>
				<td align="right">주 소 :</td>
				<td>$address</td>
			</tr>
			<tr>
				<td align="right">선호하는 <br>카페 타입</td>
				<td>$type</td>
			</tr>
			<tr>
				<td align="right">자기소개 :</td>
				<td>$intro</td>
			</tr>
			</table>
		EOT;
		// echo "아이디 : $id<br>";
		// echo "이름 : $name<br>";
		// echo "비밀번호 : $passwd<br>";
		// echo "비밀번호 확인 : $passwd_confirm<br>";
		// echo "성별 : $gender<br>";
		// echo "휴대번호 : $phone1 - $phone2 - $phone3<br>";
		// echo "주소 : $address<br>";
		// echo "감성카페 : $melo<br>";
		// echo "만화/보드게임 카페 : $book<br>";
		// echo "칵테일 카페 : $bar<br>";
		// echo "브랜드 카페 : $brand<br>";
		// echo "뷰 카페 : $view<br>";
		// echo "테마 카페 : $theme<br";
		// echo "자기소개 : $intro<br>";
		// echo "위 내용이 맞습니까?"
		// echo "제목(hidden 타입에서 전달) : $title<br>";
	?>
	<p>위 내용이 맞습니까?</p>
	</center>
	<footer style="position: relative; top: 400px;"> 
    <!-- This is the footer with default 3 divs -->
    <div>
      <p>사이트 제작 : 백건우, 한진구<br>도움 : 성결대학교 미디어소프트웨어<br>학과 최도현 교수님, 파이데이아학부<br>정명범 교수님</p>
    </div>
    <div>
      <p>사이트 주소: <br>TEL) <br>API 제공 : KAKAO</p>
    </div>
    <div class="footerlinks">
      <p><a href="#" title="Link">고객 문의사항</a></p>
    </div>
  </footer>
</div>
</body>
</html>