<html>
<head>
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<script src="Assets/default.js" type="text/javascript"></script>	
</head>
<body>
	<nav class="menu" style="padding-bottom:80px;">
          <h2><!-- 게시판 별 메뉴 -->인기 게시글  </h2>
          <hr>
		  <table style="text-align:center;">
			<thead>
				<tr>
					<th width= 55% >제목</th>
					<th width= 15% >글쓴이</th>
					<th width= 15% >작성일</th>
					<!-- 추천수 항목 추가 -->
					<th width= 13% >추천수</th>
					<th width= 10% >view</th>
				</tr>
			</thead>
			<?php
			//에러 표시
			error_reporting(E_ALL);

			ini_set('display_errors', '1');

			include "/workspace/wnateam/db.php";
			$sql = mq("select * from board1 order by thumbup desc limit 0,3"); 
				while($board = $sql->fetch_array())
				{
					//title변수에 DB에서 가져온 title을 선택
					$title=$board["title"]; 
					if(strlen($title)>30)
					{ 
						//title이 30을 넘어서면 ...표시
						$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
					}
			?>
		  <tbody>
			<tr style="height:3rem;">
			  <td width="500"><a href="/wnateam/board/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
			  <td width="120"><?php echo $board['name']?></td>
			  <td width="100"><?php echo $board['date']?></td>
			  <td width="100"><?php echo $board['thumbup']; ?></td>
			  <!-- 추천수 표시해주기 위해 추가한 부분 -->
			  <td width="100"><?php echo $board['hit']?></td>
			</tr>
		  </tbody>
		  <?php } ?>
		</table>
		  <?php
		  $sql = mq("select count(*) from board1");
			$count = $sql->fetch_array()[0];
			if($count==0) echo "<p>게시글이 없습니다.";
		  ?>
		</nav>
      <nav class="menu" style="padding-bottom:80px;">
          <h2>자유 게시판  </h2>
          <hr>
		  <table style="text-align:center;">
			<thead>
				<tr>
					<th width= 55% >제목</th>
					<th width= 15% >글쓴이</th>
					<th width= 15% >작성일</th>
					<!-- 추천수 항목 추가 -->
					<th width= 13% >추천수</th>
					<th width= 10% >view</th>
				</tr>
			</thead>
			<?php
			//에러 표시
			error_reporting(E_ALL);

			ini_set('display_errors', '1');
			$sql = mq("select * from board1 where boardtype=1 order by thumbup desc limit 0,3"); 
				while($board = $sql->fetch_array())
				{
					//title변수에 DB에서 가져온 title을 선택
					$title=$board["title"]; 
					if(strlen($title)>30)
					{ 
						//title이 30을 넘어서면 ...표시
						$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
					}
			?>
		  <tbody>
			<tr style="height:3rem;">
			  <td width="500"><a href="/wnateam/board/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
			  <td width="120"><?php echo $board['name']?></td>
			  <td width="100"><?php echo $board['date']?></td>
			  <td width="100"><?php echo $board['thumbup']; ?></td>
			  <!-- 추천수 표시해주기 위해 추가한 부분 -->
			  <td width="100"><?php echo $board['hit']?></td>
			</tr>
		  </tbody>
		  <?php } ?>
		</table>
		  <?php
		  $sql = mq("select count(*) from board1 where boardtype=1");
			$count = $sql->fetch_array()[0];
			if($count==0) echo "<p>게시글이 없습니다.";
		  ?>
		</nav>
      <nav class="menu" style="padding-bottom:80px;">
          <h2>손님 게시판  </h2>
          <hr>
		  <table style="text-align:center;">
			<thead>
				<tr>
					<th width= 55% >제목</th>
					<th width= 15% >글쓴이</th>
					<th width= 15% >작성일</th>
					<!-- 추천수 항목 추가 -->
					<th width= 13% >추천수</th>
					<th width= 10% >view</th>
				</tr>
			</thead>
			<?php
			//에러 표시
			error_reporting(E_ALL);

			ini_set('display_errors', '1');
			$sql2 = mq("select * from board1 where boardtype=2 order by thumbup desc limit 0,3"); 
				while($board2 = $sql2->fetch_array())
				{
					//title변수에 DB에서 가져온 title을 선택
					$title=$board2["title"]; 
					if(strlen($title)>30)
					{ 
						//title이 30을 넘어서면 ...표시
						$title=str_replace($board2["title"],mb_substr($board2["title"],0,30,"utf-8")."...",$board2["title"]);
					}
			?>
		  <tbody>
			<tr style="height:3rem;">
			  <td width="500"><a href="/wnateam/board/read.php?idx=<?php echo $board2["idx"];?>"><?php echo $title;?></a></td>
			  <td width="120"><?php echo $board2['name']?></td>
			  <td width="100"><?php echo $board2['date']?></td>
			  <td width="100"><?php echo $board2['thumbup']; ?></td>
			  <!-- 추천수 표시해주기 위해 추가한 부분 -->
			  <td width="100"><?php echo $board2['hit']?></td>
			</tr>
		  </tbody>
		  <?php } ?>
		</table>
		  <?php
		  $sql = mq("select count(*) from board1 where boardtype=2");
			$count = $sql->fetch_array()[0];
			if($count==0) echo "<p>게시글이 없습니다.";
		  ?>
		</nav>
		<nav class="menu" style="padding-bottom:80px;">
          <h2>사장님 게시판  </h2>
          <hr>
      	<table style="text-align:center;">
			<thead>
				<tr>
					<th width= 10% >번호</th>
					<th width= 45% >제목</th>
					<th width= 15% >글쓴이</th>
					<th width= 15% >작성일</th>
					<!-- 추천수 항목 추가 -->
					<th width= 13% >추천수</th>
					<th width= 10% >view</th>
				</tr>
			</thead>
			<?php
			//에러 표시
			error_reporting(E_ALL);

			ini_set('display_errors', '1');
			$sql3 = mq("select * from board1 where boardtype=3 order by thumbup desc limit 0,3"); 
				while($board3 = $sql3->fetch_array())
				{
					//title변수에 DB에서 가져온 title을 선택
					$title=$board3["title"]; 
					if(strlen($title)>30)
					{ 
						//title이 30을 넘어서면 ...표시
						$title=str_replace($board3["title"],mb_substr($board3["title"],0,30,"utf-8")."...",$board3["title"]);
					}
			?>
		  <tbody>
			<tr>
			  <td width="70"><?php echo $board3['idx']; ?></td>
			  <td width="500"><a href="/wnateam/board/read.php?idx=<?php echo $board3["idx"];?>"><?php echo $title;?></a></td>
			  <td width="120"><?php echo $board3['name']?></td>
			  <td width="100"><?php echo $board3['date']?></td>
			  <td width="100"><?php echo $board3['thumbup']; ?></td>
			  <!-- 추천수 표시해주기 위해 추가한 부분 -->
			  <td width="100"><?php echo $board3['hit']?></td>
			</tr>
		  </tbody>
		  <?php } ?>
		</table>
			<?php
		  $sql = mq("select count(*) from board1 where boardtype=3");
			$count = $sql->fetch_array()[0];
			if($count==0) echo "<p>게시글이 없습니다.";
		  ?>
	</nav>
</body>
</html>