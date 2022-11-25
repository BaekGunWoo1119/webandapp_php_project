<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>카페의 모든것</title>
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<script src="Assets/default.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div id="mainWrapper">
  <header> 
    <?php include ("Default_Source/mainWrapper.php"); ?>
  </header>
  <section>
  	  <img src="Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
  <div id="content">
    <section class="sidebar"> 
 	<?php include ("Default_Source/menubar.php"); ?>
	</section>
    <section class="mainContent">
	<?php include ("Default_Source/mainContent.php"); ?>
    </section>
  </div>
  <footer> 
	<?php include("Default_Source/footer.php"); ?>
  </footer>
</div>
</body>
</html>
