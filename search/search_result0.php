<html>
<head>
<meta charset="UTF-8">
<title>카페의 모든것 - 검색</title>
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="../Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<script src="Assets/default.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../Assets/styles/WriteAndReadStyle.css">
</head>
<body>
<div id="mainWrapper">
  <header> 
    <?php include ("../Default_Source/mainWrapper.php"); ?>
  </header>
	<div id="headerLinks"><?php include "../member/top_login2.php";?></div>
  <section>
  	  <img src="Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
  <div id="content">
    <section class="sidebar"> 
 	<?php include ("../Default_Source/menubar.php"); ?>
	</section>
	<div id="board_area" style= "text-align:center;"> 
<!-- 18.10.11 검색 추가 -->
	<?php
		/* 검색 변수 */
		if($_GET['catgo'] == 'all'){
			$catagory1 = '모든 항목';
		}
		if($_GET['catgo'] == 'title'){
			$catagory1 = '제목';
		}
		if($_GET['catgo'] == 'name'){
			$catagory1 = '글쓴이';
		}
		if($_GET['catgo'] == 'content'){
			$catagory1 = '내용';
		}
		$catagory2 = $_GET['catgo'];
		
		if($_GET['bo_type'] == 'allboard'){
			$bo_type1 = '모든 게시판';
		}
		if($_GET['bo_type'] == '1'){
			$bo_type1 = '자유게시판';
		}
		if($_GET['bo_type'] == '2'){
			$bo_type1 = '손님게시판';
		}
		if($_GET['bo_type'] == '3'){
			$bo_type1 = '사장님게시판';
		}
		$bo_type2 = $_GET['bo_type'];
		
		$search_con = $_GET['search'];
	?>
		<h1><?php echo $bo_type1; ?> <?php echo $catagory1; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
	<table class="list-table" style= "text-align:center;">
		<?php include "search_0.php"; ?>
    </table>
  </div>
  </div>
  <footer style="position: relative; top: 400px;"> 
	<?php include("../Default_Source/footer.php"); ?>
  </footer>
</div>
</body>
</html>