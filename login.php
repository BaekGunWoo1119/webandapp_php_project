<html>
<head>
<meta charset="UTF-8">
<title>카페의 모든것 - 로그인</title>
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="Assets/default.js" type="text/javascript"></script>
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
	<section>
	<p style="text-align:center">▶ 로그인
<br><br>
</p>
<div style="text-align: center;"> <! Div 태그로 폼 영역을 묶습니다, 스타일 적용 > 
<form method='post' action='login_action.php'>
        <p>ID: <input name="id" type="text"></p>
        <p>PW: <input name="pw" type="password"></p>
        <input type="submit" value="로그인">
</form>
 <button type="button" onclick="location.href = 'member/member_form.php'">회원가입</button>
</div>
</section>
</div>
<footer style="position: relative; top: 400px;">  
	<?php include("Default_Source/footer.php"); ?>
</footer>
</div>
</body>