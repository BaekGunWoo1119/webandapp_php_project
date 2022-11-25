<?php 
	include "/workspace/wnateam/db.php"; 
?>
<html>
<head>
<meta charset="UTF-8">
<title>카페의 모든것</title>
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<script src="Assets/default.js" type="text/javascript"></script>
</head>
<body>
<div id="mainWrapper">
  <header> 
    <div id="logo"><a href = "index.php" target = "_self"><img src= 'Assets/images/logoImage.png' alt="sample logo"></a>
    </div>
    <div id="headerLinks"><?php include "../member/top_login2.php";?></div>
  </header>
  <section>
  	  <img src="Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
  <div id="content">
    <section class="sidebar"> 
 	<?php include ("../Default_Source/menubar.php"); ?>
	</section>
	<section class="mainContent">
	<nav class="menu">
  	<h2>손님게시판</h2>
  	<h4>손님들의 가게평 및 리뷰를 제공하는 게시판입니다.</h4>
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
		if(isset($_GET['page'])){
          $page = $_GET['page'];
            }
		
		else{
              $page = 1;
            }
              $sql = mq("select * from board1 where boardtype=2");
              $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
              $list = 10; //한 페이지에 보여줄 개수
              $block_ct = 10; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.
		
        $sql2 = mq("select * from board1 where boardtype=2 order by idx desc limit $start_num, $list"); 
            while($board2 = $sql2->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title2=$board2["title"]; 
              if(strlen($title2)>25)
              { 
                //title이 30을 넘어서면 ...표시
                $title2=str_replace($board2["title"],mb_substr($board2["title"],0,25,"utf-8")."...",$board2["title"]);
              }
			//댓글 수 카운트
              $sql3 = mq("select * from reply1 where con_num='".$board2['idx']."'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
              $rep_count = mysqli_num_rows($sql3); //num_rows로 정수형태로 출력
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board2['idx']; ?></td>
          <td width="500"><a href="/wnateam/board/read.php?idx=<?php echo $board2["idx"];?>"><?php echo $title2;?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a></td>
          <td width="120"><?php echo $board2['name']?></td>
          <td width="100"><?php echo $board2['date']?></td>
		  <td width="100"><?php echo $board2['thumbup']?></td>
          <td width="100"><?php echo $board2['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
	<br>
	<?php
		  $sql4 = mq("select count(*) from board1 where boardtype=2");
			$count = $sql4->fetch_array()[0];
			if($count==0) echo "<p>게시글이 없습니다.";
		  ?>
	<br><br>
	<!---페이징 넘버 --->
    <div>
        <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<a> 처음 </a>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<a href='https://wnateam-bieok.run.goorm.io/wnateam/board2/board2.php?page=1'> 처음 </a>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<a> [$i] </a>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<a href='https://wnateam-bieok.run.goorm.io/wnateam/board2/board2.php?page=$i'> [$i] </a>"; //아니라면 $i
            }
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<a> 마지막 </a>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<a href='https://wnateam-bieok.run.goorm.io/wnateam/board2/board2.php?page=$total_page'> 마지막 </a>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
    </div>
    <div style ="position: absolute; left : 85%; top : 1000px;">
	<?php if(!$userid){?>
		<a></a>
	<?php }
		  else if($usertype == "C"){?>
		<a></a>
	<?php }
		  else{?>	
      <a href="/wnateam/board2/write2.php"><button>글쓰기</button></a>
	<?php }?>
    </div>
    </nav>
	</section>	
	</div>
	<footer style="position: relative; top: 400px;">  
	<?php include("../Default_Source/footer.php"); ?>
  	</footer>
	</div>
	</body>
</html>
	