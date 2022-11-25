<?php
	header('Content-Type: text/html; charset=utf-8'); 

	$db = new mysqli("localhost","root","","bbs"); 
	$db->set_charset("utf8");
	
	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
	session_start();
	
	$usernick = $_SESSION['usernick'];
	$content = $_POST['qna_text'];
		if($usernick && $content){
    	$sql = mq("insert into QnA(usernick, content) values('".$usernick."','".$content."')"); 
    	echo "<script>
    	alert('문의사항이 등록되었습니다.');
    	window.location = document.referrer;</script>";
		}
		else{
		echo "<script>
    	alert('문의사항 등록 중 오류가 발생했습니다.');
    	window.location = document.referrer;</script>";
		}
?>