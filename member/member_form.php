<?php
	session_start(); 
?>
<html>
<head> 
<title>카페의 모든것</title>
<meta charset="UTF-8">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="../Assets/styles/memberForm.css" rel="stylesheet" type="text/css">
<link href="../Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<script src = "../js/member_form.js" type="text/javascript"></script>
</head>

<body>
<div id="mainWrapper">
  <header>
    <div id="logo"><a href = "../index.php" target = "_self"><img src= '../Assets/images/logoImage.png' alt="sample logo"></a>
    </div>
    <div id="headerLinks"><?php include "../member/top_login2.php";?></div>
  </header>
 <section>
  	  <img src="../Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
 <div id="content" style= "position:relative; top: 50px;">
    <section class="mainContent">
		<div style= "position:relative; left: 15%;">
        <form  name="member_form" method="post" action="/wnateam/member/insert.php"> 
			<div><img src="../Assets/images/title_join.gif"></div>
			<table id="memberForm">
				<tr>
					<th>* 아이디</th>
					<td><input type="text" name="id"><a href="#"><img src="../Assets/images/check_id.gif" onclick="check_id()"></a></td>
				</tr>
				<tr>
					<td colspan=2 class="tdCenter">4~12자의 영문 소문자, 숫자와 특수기호(_) 만 사용할 수 있습니다.</td>
				</tr>
				<tr>
					<th>* 비밀번호</th>
					<td><input type="password" name="pass"></td>
				</tr>
				<tr>
					<th>* 비밀번호 확인</th>
					<td><input type="password" name="pass_confirm"></td>
				</tr>
				<tr>
					<th>* 이름</th>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<th>* 닉네임</th>
					<td><input type="text" name="nick"><a href="#"><img src="../Assets/images/check_id.gif" onclick="check_nick()"></a></td>
				</tr>
				<tr>
					<th>* 휴대폰</th>
					<td>
						<select class="hp" name="hp1"> 
						<option value='010'>010</option>
						<option value='011'>011</option>
						<option value='016'>016</option>
						<option value='017'>017</option>
						<option value='018'>018</option>
						<option value='019'>019</option>
						</select>  - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3">
					</td>
				</tr>
				<tr>
					<th>* 회원분류</th>
					<td>
						<input type="radio" name="usertype" id="usertype" value="C" checked>사장
						<input type="radio" name="usertype" id="usertype" value="B">손님
					</td>
				</tr>
				<tr>
					<th> 이메일</th>
					<td>
						<input type="text" id="email1" name="email1"> @ <input type="text" name="email2">
					</td>
				</tr>
				<tr>
					<td colspan=2 class="tdCenter"> * 표시는 필수 입력 항목입니다.</td>
				</tr>
			</table>

		<div id="button"><a href="#"><img src="../Assets/images/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
		                 <a href="#"><img src="../Assets/images/button_reset.gif" onclick="reset_form()"></a>
		</div>
	    </form>
	</div><!-- end of col2 -->
	</section>
	</div>
  <footer style= "position:relative; top: 500px;"> 
	<?php include("../Default_Source/footer.php"); ?>
  </footer>
</div><!-- end of content --> <!-- end of wrap -->	
</body>
</html>
