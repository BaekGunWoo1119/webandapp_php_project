<?php
    session_start();

	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$usernick = $_SESSION['usernick'];
	$usertype =$_SESSION['usertype'];
	$userpw =$_SESSION['userpw'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
	<title>카페의 모든것</title>
	<meta charset="UTF-8"><meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
	<link href="../Assets/styles//eCommerceStyle.css" rel="stylesheet" type="text/css">
	<link href="../Assets/styles/memberForm.css" rel="stylesheet" type="text/css">
	<script src = "../js/member_form.js" type="text/javascript"></script>
</head>

<?php
    include "../db.php";

    $sql = mq("select * from member where id='$userid'"); //그냥 가져오게 되면 보안에 취약함, 개선:세션정보를 그대로 가져와야함

    $row = mysqli_fetch_array($sql);

    $hp = explode("-", $row[hp]); //값들을 기준값을 가지고 분리 해주는 함수 
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];
	
	$userid = $row[id];
	$username = $row[name];
	$usernick = $row[nick];
	$usertype = $row[usertype];
	$userpw = $row[pass];
?>
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
  	<div id="content">
    	<section class="sidebar"> 
 			<?php include ("../Default_Source/menubar.php"); ?>
		</section>
    	<section class="mainContent" style = "overflow:visible;">
			<form  name="member_form" method="post" action="/wnateam/member/update.php"> 
				<table id="memberForm">
					<tr>
						<th>* 아이디</th>
						<td><?php echo $row[id]; ?><input type="hidden" name="id" value="<?php echo $row[id]; ?>"></td>
					</tr>
					<tr>
						<td colspan=2 class="tdCenter">4~12자의 영문 소문자, 숫자와 특수기호(_) 만 사용할 수 있습니다.</td>
					</tr>
					<tr>
						<th>* 비밀번호</th>
						<td><input type="password" name="pass" value=""></td>
					</tr>
					<tr>
						<th>* 비밀번호 확인</th>
						<td><input type="password" name="pass_confirm" value=""></td>
					</tr>
					<tr>
						<th>* 이름</th>
						<td><input type="text" name="name" value="<?php echo $row[name]; ?>"></td>
					</tr>
					<tr>
						<th>* 닉네임</th>
						<td><input type="text" name="nick" value="<?php echo $row[nick]; ?>"></td>
					</tr>
					<tr>
						<th>* 휴대폰</th>
						<td>
							<input type="text" class="hp" name="hp1" value="<?php echo $hp1; ?>">
							 - <input type="text" class="hp" name="hp2" value="<?php echo $hp2; ?>"> - <input type="text" class="hp" name="hp3" value="<?php echo $hp3; ?>">
						</td>
					</tr>
					<tr>
						<th>* 회원분류</th>
						<td><?php echo ($usertype=="A" ? "관리자" : ($usertype=="B" ? "손님" : "사장")); ?><input type="hidden" name="usertype" value="<?php echo $usertype; ?>"></td>
					</tr>
					<tr>
						<th>* 이메일</th>
						<td>
							<input type="text" id="email1" name="email1" value="<?php echo $email1; ?>"> @ <input type="text" name="email2" 
						   value="<?php echo $email2; ?>">
						</td>
					</tr>
					<tr>
						<td colspan=2 class="tdCenter"> * 표시는 필수 입력 항목입니다.</td>
					</tr>
				</table>
				<div id="button"><a href="#"><img src="../Assets/images/button_save.gif"  onclick="check_input()"></a>
				</div>
			</form>
		</section>
	</div>
  <footer style= "position:relative; top: 250px;"> 
	<?php include("../Default_Source/footer.php"); ?>
  </footer>
  </div>
</body>
</html>
