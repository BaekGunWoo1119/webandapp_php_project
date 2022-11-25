<?php

	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php";
	session_start();
	$usertype = $_SESSION['usertype'];
	$bno = $_GET['idx'];
	$pwd = $_POST['pw'];
	$sql = mq("select * from board1 where idx='".$bno."'");
	while($board = $sql->fetch_array()){
		$pwk = $board['pw'];
		if(password_verify($pwd, $pwk)){
		$sql2 = mq("delete from board1 where idx='".$bno."'");
		echo "<script>
			alert('삭제되었습니다.');
			window.open('/wnateam/board/board1.php', '_self');
			</script>";
		}
		else if($usertype == "A"){
		$sql2 = mq("delete from board1 where idx='".$bno."'");
		echo "<script>
			alert('삭제되었습니다.');
			window.open('/wnateam/board/board1.php', '_self');
			</script>";	
		}
		else{
			echo "<script>
			alert('비밀번호가 틀렸습니다.');
			history.back();
			</script>";
		}
	}
    	
?>