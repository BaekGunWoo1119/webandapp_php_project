<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
	
	session_start();
	
	$pw =$_SESSION['userpw'];

    $bno = $_GET['idx'];
	if(!$pw){
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
	}
	else{
	$userpw = $_POST['dat_pw'];
	}
    $dat_user = $_POST['dat_user'];
	$content = $_POST['content'];

    if($bno && $dat_user && $userpw && $content){
        $sql = mq("insert into reply1(con_num,name,pw,content) values('".$bno."','".$dat_user."','".$userpw."','".$content."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>