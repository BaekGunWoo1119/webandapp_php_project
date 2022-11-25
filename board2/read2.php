<?php 
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	include "/workspace/wnateam/db.php"; 
?>
<html>
<head>
<meta charset="UTF-8">
<title>카페의 모든것</title>
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="../Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<link href="../Assets/styles/WriteAndReadStyle.css" rel="stylesheet" type="text/css">
<script src="../Assets/default.js" type="text/javascript"></script>
</head>
<body>
<div id="mainWrapper">
  <header> 
    <div id="logo"><a href = "../index.php" target = "_self"><img src= '../Assets/images/logoImage.png' alt="sample logo"></a>
    </div>
    <div id="headerLinks"><?php include "../member/top_login2.php";?></div>
  </header>
  <section>
  	  <img src="../Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
  <div id="content" style ="overflow:visible;">
    <section class="sidebar"> 
 	 <!-- 검색 창, 검색 엔진 부분 -->
	<form action="/wnateam/search/search_result0.php" method="get">
	  <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
	  <select name="bo_type">
        <option value="board1">자유게시판</option>
        <option value="board2">손님게시판</option>
        <option value="board3">사장님게시판</option>
      </select>
      <input type="text" name="search" id="search" placeholder="search">
	  <button type="submit"><img src="../search.png" height = 25px width = 25px></button>
	</form>
      <div id="menubar">
        <nav class="menu"><!-- 메뉴 세팅 -->
          <h2>MENU  </h2>
          <hr>
          <ul>
            <!-- 메뉴 리스트 -->
            <li><a href = "../board/board1.php" target = "_self">자유게시판</a></li>
            <li><a href = "board2.php" target = "_self">손님게시판</a></li>
            <li><a href = "../board3/board3.php" target = "_self">사장님게시판</a></li>
            <li><a href = "../maps.php" target = "_self">지도 서비스</a></li>
          </ul>
        </nav>
      </div>
    </section>
	<section>
	<nav class="menu">
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from board1 where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board1 set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board1 where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
  	<!-- 글 불러오기 -->
	<div id="board_read" style = "position:relative; right:40%; overflow:visible; text-align:center;">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?> <br> 추천수:<?php echo $board['thumbup']; ?>
				<div id="bo_line" style = "width:140%; position:relative; right:50%;"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
			<br>
			<br>
			<a style= "position:relative;" href="thumbup2.php?idx=<?php echo $board['idx']; ?>">
				<img src = "/wnateam/Assets/images/thumbup.png"style= "width:20%; height:7%;"></a><br>
			<h3 style= "color:#4aa8d8;"><?php echo $board['thumbup']; ?></h3>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser" >
		<br>
		<br>
		<ul style= "position:relative; width:120%; left: 110%;">
			<li><a href="/wnateam/board2/board2.php"><img src = "/wnateam/Assets/images/list.png"></a></li>
			<li><a href="modify2.php?idx=<?php echo $board['idx']; ?>"><img src = "/wnateam/Assets/images/modify.png"></a></li>
			<li><a href="delete2.php?idx=<?php echo $board['idx']; ?>"><img src = "/wnateam/Assets/images/delete.png"></a></li>
		</ul>
	</div>
	</div>
	</nav>
	</section>
		<!--- 댓글 불러오기 -->
	<link href="../Assets/styles/ReplyStyle.css" rel="stylesheet" type="text/css">
	<div class="reply_view" style= "position:relative; width:60%; left:33%;" >
	<!--script src="../js/common.js" type="text/javascript"></script-->	
	<br>
	<br>
	<br>
	<br>
	<h3>댓글목록</h3>
		<?php
			$sql3 = mq("select * from reply2 where con_num='".$bno."' order by idx desc");
			while($reply = $sql3->fetch_array()){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a href="#" onclick="window.open('reply_edit2.php?idx=<?php echo $reply['idx'];?>&bno=<?php echo $bno;?>', '댓글 수정','width=600px, height=600px'); return false">수정</a>
				<a href="#" onclick="window.open('reply_delete2.php?idx=<?php echo $reply['idx'];?>&bno=<?php echo $bno;?>', '댓글 삭제','width=600px, height=600px'); return false">삭제</a>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
				 </form>
			</div>
		</div>
		<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="/wnateam/board2/reply_ok2.php?idx=<?php echo $bno; ?>" method="post">
			<?php if(!$userid){?>
					<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
					<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
			<?php }
				else{?>
					<b><?php echo $usernick;?></b>
					<input type="hidden" name="dat_user" id="dat_user" class="dat_user" value="<?php echo $usernick; ?>">
					<input type="hidden" name="dat_pw" id="dat_pw" class="dat_pw" value="<?php echo $userpw; ?>">
			<?php }?>
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
	</div><!--- 댓글 불러오기 끝 -->
	<div id="foot_box"></div>	
	</div>
	<footer style="position: relative; top: 400px;">  
	<?php include("../Default_Source/footer.php"); ?>
  	</footer>
	</div>
	</body>
</html>