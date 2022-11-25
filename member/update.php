<meta charset="utf-8">
<?php
	$id = $_POST['id'];
	$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$name = $_POST['name'];
	$nick = $_POST['nick'];
	$hp1 =  $_POST['hp1'];
	$hp2 =  $_POST['hp2'];
	$hp3 =  $_POST['hp3'];
	$hp = $hp1."-".$hp2."-".$hp3;
	$usertype = $_POST['usertype'];
	$email1= $_POST['email1'];
	$email2= $_POST['email2'];
	$email= $email1."@".$email2;
	$ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장

  	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php";      // db.php 파일을 불러옴
	
	$sql = mq("UPDATE member SET pass='".$pass."', name='".$name."', nick='".$nick."', hp='".$hp."', email='".$email."' WHERE id='".$id."'");
              // DB 연결 끊기
   	echo "<script>
	   	alert('정보 수정이 완료되었습니다.');
	    location.href = '../index.php';
	   	</script>";
?>

   
