<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 

	session_start();

    $bno = $_GET['idx'];
	$usertype =$_SESSION['usertype'];
    $dat_user = $_POST['dat_user'];
	$content = $_POST['content'];
	

	if($usertype == "B"){
    	if($bno && $dat_user && $content){
        	$sql = mq("insert into reply2(con_num,name,content) values('".$bno."','".$dat_user."','".$content."')");
        	echo "<script>alert('댓글이 작성되었습니다.'); 
        	location.href='read2.php?idx=$bno';</script>";
    	}	
		else{
        	echo "<script>alert('댓글 작성에 실패했습니다.'); 
        	history.back();</script>";
    	}
	}
	else{
		echo "<script>alert('댓글 작성 권한이 없습니다.'); 
        	history.back();</script>";
	}
?>