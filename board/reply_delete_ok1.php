<?php
error_reporting(E_ALL);

ini_set('display_errors', '1');
include "/workspace/wnateam/db.php"; 

session_start();
$usernick = $_SESSION['usernick'];

$rno = $_POST['rno']; 
$sql = mq("select * from reply1 where idx='".$rno."'");//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = mq("select * from board1 where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$pwk = $_POST['pw'];
$bpw = $reply['pw'];
$bid = $reply['name'];

if(password_verify($pwk, $bpw)) 
	{
		$sql = mq("delete from reply1 where idx='".$rno."'"); ?>
	<script type="text/javascript">alert('댓글이 삭제되었습니다.'); window.close();</script>
	<?php
	}else if($usernick = $bid){
		$sql = mq("delete from reply1 where idx='".$rno."'");?>
	<script type="text/javascript">alert('댓글이 삭제되었습니다.'); window.close();</script>
	<?php
	}else{ ?>
		<script type="text/javascript">alert('비밀번호가 틀립니다');history.back();</script>
	<?php } ?>