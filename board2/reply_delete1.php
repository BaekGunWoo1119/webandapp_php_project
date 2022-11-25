<link href="../Assets/styles/Reply_Style.css" rel="stylesheet" type="text/css">
<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php";
	$idx = $_GET['idx'];
	$bno = $_GET['bno'];
	$sql = mq("select * from reply1 where idx='".$idx."'");
	while($reply = $sql->fetch_array()){ 
?>
<div>
	<form action="reply_delete_ok1.php" method="post">
		<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
		<p>비밀번호를 입력하세요.<input type="password" name="pw" /> <input type="submit" value="확인"></p>
	</form>
</div>
<?php } ?>