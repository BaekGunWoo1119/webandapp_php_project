<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=5eac921756bd2b0036b7b7ce8d947e42&libraries=services"></script>
<title>카페의 모든것</title>
<base href="https://wnateam-bieok.run.goorm.io/wnateam/maps.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<script src="Assets/default.js" type="text/javascript"></script>
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
		<?php include("js/maps_js.php"); ?>
	</section>
	</div>
	<footer style="position: relative; top: 200px;">   
	<?php include("Default_Source/footer.php"); ?>
	</footer>
	</div>
	</body>
</html>