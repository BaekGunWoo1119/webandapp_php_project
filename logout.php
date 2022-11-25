<?php
  	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$usernick = $_SESSION['usernick'];
	$usertype = $_SESSION['usertype'];
	$nserpw = $_SESSION['userpw'];
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
  unset($_SESSION['usertype']);
  unset($_SESSION['userpw']);

  echo("
       <script>
          location.href = '/wnateam/index.php'; 
         </script>
       ");
?>
