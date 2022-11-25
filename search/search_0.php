<html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="../Assets/styles/WriteAndReadStyle.css">
</head>
<body>
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
		  error_reporting(E_ALL);

			ini_set('display_errors', '1');
		
			include "/workspace/wnateam/db.php"; 
		
			if($bo_type2 == 'allboard'){
				
				if($catagory2 == 'all'){
				$sql2 = mq("select * from board1 where title OR name like '%$search_con%' order by idx desc");
				}
				else{
				$sql2 = mq("select * from board1 where $catagory2 like '%$search_con%' order by idx desc");
				}
			}
			else if ($catagory2 == 'all'){
				if($bo_type2 == 'allboard'){
				$sql2 = mq("select * from board1 where title OR name like '%$search_con%' order by idx desc");	
				}
				else{
				$sql2 = mq("select * from board1 where boardtype='".$bo_type2."' like '%$search_con%' order by idx desc");
				}
			}
			else{
          		$sql2 = mq("select * from board1 where $catagory2 like '%$search_con%' AND boardtype='".$bo_type2."' order by idx desc");
			
			}
         	while($board = $sql2->fetch_array())
				{
					//title변수에 DB에서 가져온 title을 선택
					$title=$board["title"]; 
					if(strlen($title)>30)
					{ 
						//title이 30을 넘어서면 ...표시
						$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
					}
            $sql3 = mq("select * from reply1 where con_num='".$board['idx']."'");
            $rep_count = mysqli_num_rows($sql3);
        ?>
      <tbody>
        <tr>
          <td width="500">

        <!--- 추가부분 18.08.01 --->
        <?php
          $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
          $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음
          ?>
        <!--- 추가부분 18.08.01 END -->
		  <a href='../wnateam/board/read.php?idx=<?php echo $board["idx"]; ?>'><span style="background:yellow;"><?php echo $title;?></span><span class="re_ct">[<?php echo $rep_count;?>]</span></a></td>
          <td width="120"><?php echo $board['name'];?></td>
          <td width="100"><?php echo $board['date'];?></td>
		  <td width="100"><?php echo $board['thumbup']; ?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
		<?php }?>
      </tbody>
</body>
</html>