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
	
	$user_id = $_SESSION['usernick'];
	$usertype = $_SESSION['usertype'];
	$rate = $_POST['rating'];
	$content = $_POST['rating_text'];
	$mkt_name = $_GET['market'];
	$coor = $_GET['coor'];
	if($usertype == "B"){
		if($mkt_name && $coor && $user_id && $rate && $content){
    	$sql = mq("insert into rating(mkt_name, coor, user_id, rating_star, content) values('".$mkt_name."','".$coor."','".$user_id."','".$rate."','".$content."')"); 
    	echo "<script>
    	alert('별점 평가가 완료되었습니다.');
    	window.location = document.referrer;</script>";
		}
		else{
		echo "<script>
    	alert('별점 평가중 오류가 발생했습니다.');
    	window.location = document.referrer;</script>";
		}
	}
	else{
		echo "<script>
    	alert('별점 평가 권한이 없습니다.');
    	window.location = document.referrer;</script>";
	}
?>