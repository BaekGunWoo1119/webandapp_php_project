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

   $sql = mq("select * from member where id='$id'");
   //$result = mysqli_query($sql, $connect);
   $exist_id = mysqli_num_rows($sql);

   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {            // 레코드 삽입 명령을 $sql에 입력 
	    $sql = mq("insert into member(id, pass, name, nick, hp, usertype, email) values('$id', '$pass', '$name', '$nick', '$hp', '$usertype', '$email' )");

		//mysqli_query($sql, $connect);  // $sql 에 저장된 명령 실행
   }
              // DB 연결 끊기
   echo "
	   <script>
		alert('회원가입이 완료되었습니다.');
	    location.href = '../index.php';
	   </script>
	";
?>

   
