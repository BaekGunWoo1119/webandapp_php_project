<?php 
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
	
//각 변수에 write.php에서 input name값들을 저장한다

$usernick = $_POST['usernick'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($usernick && $userpw && $title && $content){
    $sql = mq("insert into board1(name, pw, title, content, date, hit, thumbup, boardtype) values('".$usernick."','".$userpw."','".$title."','".$content."','".$date."','0','0','1')"); 
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/wnateam/board/board1.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>