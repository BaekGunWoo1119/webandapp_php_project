<?php

	session_start();
	
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$usernick = $_SESSION['usernick'];
	$usertype =$_SESSION['usertype'];
	$userpw =$_SESSION['userpw'];

    if(!$userid)
	{
?>
          <a href="/wnateam/login.php" style = "position:relative; left:65px;">로그인</a><a href="/wnateam/member/member_form.php"> | 회원가입</a>
<?php
	}
	else
	{
	 	echo $usernick?> (회원 분류:
		<?php if($usertype == "A"){
				echo "관리자";
				} 
				if($usertype == "B"){
				echo "손님 회원";
				}
	 			if($usertype == "C"){
				echo "사장님 회원";
				}?>) | 
		<a href="/wnateam/logout.php">로그아웃</a> | <a href="/wnateam/member/member_form_modify.php">정보수정</a>
<?php
	}
?>
