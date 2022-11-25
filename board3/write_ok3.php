<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
	session_start();
	
	$userid = $_SESSION['usernick'];
	$usertype =$_SESSION['usertype'];

//각 변수에 write.php에서 input name값들을 저장한다
$userpw = password_hash(1234, PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

if($usertype == "C"){
	if($userid && $userpw && $title && $content){
    	$sql = mq("insert into board1(name, pw, title, content, date, hit, thumbup, boardtype) values('".$userid."','".$userpw."','".$title."','".$content."','".$date."','0','0','3')"); 
    	echo "<script>
    	alert('글쓰기 완료되었습니다.');
    	location.href='/wnateam/board2/board2.php';</script>";
	}
	else{
    	echo "<script>
    	alert('글쓰기에 실패했습니다.');
   		history.back();</script>";
		}
	}
else{
	echo "<script>
    	alert('권한이 없습니다.');
   		history.back();</script>";
}
?>