<?php
error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 

$bno = $_GET['idx'];
$sql = mq("select * from board1 where idx='$bno';");
$board = $sql->fetch_array();
$pwk = $board['pw'];
$nick = $board['name'];

$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];

if($userpw == $pwk){
$sql2 = mq("update board1 set name='".$username."',pw='".$userpw."',title='".$title."',content='".$content."' where idx='".$bno."'"); ?>
<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=/wnateam/board/read.php?idx=<?php echo $bno; ?>">
<?php }
else if ($username == $nick){
$sql2 = mq("update board1 set name='".$username."',pw='".$userpw."',title='".$title."',content='".$content."' where idx='".$bno."'"); ?>
<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=/wnateam/board/read.php?idx=<?php echo $bno; ?>">
<?php }
else{ echo"<script>
		alert('권한이 없습니다.'); 
		history.back()
		</script>" ;}
?>