<link href="../Assets/styles/ReplyStyle.css" rel="stylesheet" type="text/css">
<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php";
	session_start();
	$idx = $_GET['idx'];
	$bno = $_GET['bno'];
	$usernick =$_SESSION['usernick'];
	$sql = mq("select * from reply2 where idx='".$idx."'");
	while($reply = $sql->fetch_array()){
		if($usernick == ("$reply[name]")){
?>
<div>
	<form method="post" action="rep_modify_ok2.php">
		<input type="hidden" name="rno" value="<?php echo $idx; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
		<textarea name="content" class="dap_edit_t"><?php echo nl2br("$reply[content]"); ?></textarea>
		<input type="submit" value="수정하기" class="re_mo_bt">
	</form>
</div>
<?php }
		else{
				echo "댓글을 수정할 권한이 없습니다!";
			}
	}
?>
