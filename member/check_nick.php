<meta charset="euc-kr">
<?php
	$nick = $_GET['nick'];
   if(!$nick) 
   {
      echo("닉네임을 입력하세요.");
   }
   else
   {
      error_reporting(E_ALL);

		ini_set('display_errors', '1');
		include "/workspace/wnateam/db.php";
 
      $sql = mq("select * from member where nick='$nick' ");

      $num_record = mysqli_num_rows($sql);

      if ($num_record)
      {
         echo "닉네임이 중복됩니다.<br>";
         echo "다른 닉네임을 사용하세요.<br>";
      }
      else
      {
         echo "사용가능한 닉네임입니다.";
      }
   }
?>

