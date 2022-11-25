<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
	session_start();

	$usernick = $_SESSION['usernick'];
	$usertype = $_SESSION['usertype'];
	if(!$usernick){
		echo "<script>
    		alert('삭제 권한이 없습니다.');
    		window.location = document.referrer;</script>";
		}
	$bno = $_GET['idx'];
	$sql = mq("select * from board1 where idx='".$bno."'");
	while($board = $sql->fetch_array()){
		if($usernick == ("$board[name]")){
			$sql2 = mq("delete from board1 where idx='$bno';");
			echo"<script>
			alert('삭제되었습니다.');
			</script>";
		}
		else if($usertype == "A"){
			$sql2 = mq("delete from board1 where idx='$bno';");
			echo"<script>
			alert('삭제되었습니다.');
			</script>";
		}
		else{
			echo "<script>
    		alert('삭제 권한이 없습니다.');
    		window.location = document.referrer;</script>";
		}
	}
?>
<meta http-equiv="refresh" content="0 url=/wnateam/board3/board3.php" />