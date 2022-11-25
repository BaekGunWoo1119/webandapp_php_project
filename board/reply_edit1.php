<link href="../Assets/styles/ReplyStyle.css" rel="stylesheet" type="text/css">
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
	<form method="post" action="rep_modify_ok1.php">
		<input type="hidden" name="rno" value="<?php echo $idx; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
		<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
		<textarea name="content" class="dap_edit_t"><?php echo nl2br("$reply[content]"); ?></textarea>
		<input type="submit" value="수정하기" class="re_mo_bt">
	</form>
</div>
<?php } ?>
