<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>카페의 모든것</title>
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<link href="Assets/styles/WriteAndReadStyle.css" rel="stylesheet" type="text/css">
<script src="Assets/default.js" type="text/javascript"></script>
</head>
<body>
<div id="mainWrapper" style="width:90%">
  <header> 
   <div id="logo"><a href = "index.php" target = "_self"><img src= 'Assets/images/logoImage.png' alt="sample logo"></a>
    </div>
    <div id="headerLinks"><?php include "../member/top_login2.php";?></div>
  </header>
  <section>
  	  <img src="./Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
  <div id="content">
    <section class="sidebar" style="position: relative; width:25%; height:500px; "> 
 	<?php include ("../Default_Source/menubar.php"); ?>
    </section>
	<div id="board_write">
        <h1><a href="/wnateam/board/board1.php">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area" style="width:100%">
                <?php include("write11.php"); ?>
            </div>
        </div>
	  </div>
	<footer style="position: relative; top: 400px;">  
	<?php include("../Default_Source/footer.php"); ?>
  	</footer>
</div>
</body>
</html>