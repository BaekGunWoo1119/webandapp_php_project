<html>
<head>
<link href="/wnateam/Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
<script src="/wnateam/Assets/default.js" type="text/javascript"></script>	
</head>
<body>
      <!-- 검색 창, 검색 엔진 부분 -->
	<form action="/wnateam/search/search_result0.php" method="get">
	  <select name="catgo">
		<option value="all">제목+글쓴이</option>
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
	  <select name="bo_type">
		<option value="allboard">모든게시판</option>
        <option value="1">자유게시판</option>
        <option value="2">손님게시판</option>
        <option value="3">사장님게시판</option>
      </select>
      <input type="text" name="search" id="search" placeholder="search">
	  <button type="submit"><img src="/wnateam/search.png" height = 25px width = 25px></button>
	</form>
      <div id="menubar">
        <nav class="menu"><!-- 메뉴 세팅 -->
          <h2>MENU  </h2>
          <hr>
          <ul>
            <!-- 메뉴 리스트 -->
            <li><a href = "/wnateam/board/board1.php" target = "_self">자유게시판</a></li>
            <li><a href = "/wnateam/board2/board2.php" target = "_self">손님게시판</a></li>
            <li><a href = "/wnateam/board3/board3.php" target = "_self">사장님게시판</a></li>
            <li><a href = "/wnateam/maps.php" target = "_self">지도 서비스</a></li>
			<li><a href = "/wnateam/view.php" target = "_self">사이트 소개</a></li> 
          </ul>
        </nav>
      </div>
</body>
</html>