<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
   
	$bno = $_GET['idx'];
    $thumbup = mysqli_fetch_array(mq("select thumbup from board2 where idx='$bno';"));
    $thumbup = $thumbup['thumbup'] + 1;
    mq("update board2 set thumbup=".$thumbup." where idx=".$bno.";");
    ?>
    <script type="text/javascript">alert("추천되었습니다.");</script>
    <meta http-equiv="refresh" content="0 url=/wnateam/board2/board2.php" />