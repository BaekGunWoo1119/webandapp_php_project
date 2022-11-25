<?php

	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
	$rno = $_POST['rno'];//댓글번호
	$sql = mq("select * from reply2 where idx='".$rno."'"); //reply테이블에서 idx가 rno변수에 저장된 값을 찾음
	$reply = $sql->fetch_array();

	$sql2 = mq("update reply2 set content='".$_POST['content']."' where idx = '".$rno."'");//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
?> 
<script type="text/javascript">alert('수정되었습니다.'); window.close();</script>