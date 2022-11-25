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
	
	$con_idx = $_POST['qna_idx'];
	$content = $_POST['qna_text'];
		if($con_idx && $content){
    	$sql = mq("insert into QnA_res(con_idx, content) values('".$con_idx."','".$content."')"); 
    	echo "<script>
    	alert('답변이 등록되었습니다.');
    	window.location = document.referrer;</script>";
		}
		else{
		echo "<script>
    	alert('답변 등록 중 오류가 발생했습니다.');
    	window.location = document.referrer;</script>";
		}
?>