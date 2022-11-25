<?php

	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 

	session_start();
	$userpw =$_SESSION['userpw'];
	$usernick = $_SESSION['usernick'];

	$rno = $_POST['rno'];//댓글번호
	$sql = mq("select * from reply1 where idx='".$rno."'"); //reply테이블에서 idx가 rno변수에 저장된 값을 찾음
	$reply = $sql->fetch_array();

	$bno = $_POST['b_no']; //게시글 번호
	$sql2 = mq("select * from board1 where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
	$board = $sql2->fetch_array();

	$pwk = $_POST['pw'];
	$bpw = $reply['pw'];
	$bid = $reply['name'];

if(password_verify($pwk, $bpw)) 
	{
		$sql3 = mq("update reply1 set content='".$_POST['content']."' where idx = '".$rno."'"); //reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
	?><script type="text/javascript">alert('수정되었습니다.'); window.close();</script>
	<?php
	}else if($usernick = $bid){
		$sql3 = mq("update reply1 set content='".$_POST['content']."' where idx = '".$rno."'"); //reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
	?><script type="text/javascript">alert('수정되었습니다.'); window.close();</script>
	<?php
	}else{ ?>
	<script type="text/javascript">alert('비밀번호가 맞지 않습니다.'); window.close();</script>
	<?php } ?>