<?php

	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php";

	$bno = $_GET['idx'];
	$sql = mq("select * from board1 where idx='".$bno."'");
	while($board = $sql->fetch_array()){
		echo "비밀번호를 입력하세요.";?>
		<form action="delete1_ok.php?idx=<?php echo $bno;?>" method="post">
		<input type='password' name='pw' />
		</form>
	<?php }
    	
?>
