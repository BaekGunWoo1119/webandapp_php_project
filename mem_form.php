<html>
<head>
<meta http-equiv="Content-Type" charset="euc-kr" />
<title>카페의 모든것 - 회원가입</title>
<base href="https://wnateam-bieok.run.goorm.io/wnateam/index.php">
<meta name="백건우, 한진구" content="width=device-width, initial-scale=1">
<link href="Assets/styles/eCommerceStyle.css" rel="stylesheet" type="text/css">
	<script>
   function check_id()
   {
     window.open("memeber/check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<body>
	
	
	
<div id="mainWrapper">
  <header> 
    <?php include ("Default_Source/mainWrapper.php"); ?>
  </header>
  <section>
  	  <img src="Assets/images/titleImage.png" style= "text-align:center; position:relative; bottom: 30%;" alt="Title Image" width="100%">
  </section>
<h2 style = text-align:center>▶ 회원가입</h2>
<center>
<form name="mem_form" action="mem_print.php" method="POST">
<input type="hidden" name="title" value="회원 가입 양식"> 
<table border="1" width="640" cellspacing="1" cellpadding="4" >
<tr>
	<td align="right">* 아이디 :</td>
	<td><input type="text" size="15" maxlength="12" name="id" value="guest"></td>
</tr>
<tr>
	<td align="right" > * 이름 :</td>
	<td><input type="text" size="15" maxlength="12" name="name"></td>
</tr>
<tr>
<td align="right"> * 비밀번호 :</td>
	<td><input type="password" size="15" maxlength="10" name="passwd"            value="1234"></td>
</tr>
<tr>
	<td align="right"> * 비밀번호 확인 :</td>
	<td><input type="password" size="15" maxlength="12" name="passwd_confirm">      </td>
</tr>
<tr>
	<td align="right">성별 :</td>
	<td><input type="radio" name="male" value="M" checked>남
		<input type="radio" name="female" value="F">여</td>
</tr>
<tr>
	<td align="right">회원분류 :</td>
	<td><input type="radio" name="owner" value="C" checked>사장
		<input type="radio" name="consumer" value="B">손님</td>
</tr>
<tr>
	<td align="right">휴대전화 :</td>
	<td><select name="phone1">
		<option>선택</option>
		<option value="010">010</option>
		<option value="011">011</option>
		<option value="017">017</option>
		<option value="017">019</option>
		</select> - 
	<input type="text" size="4" name="phone2" maxlength="4"> -
	<input type="text" size="4" name="phone3" maxlength="4"></td>
</tr>
<tr>
	<td align="right">주 소 :</td>
	<td><input type="text" size="50" name="address"></td>
</tr>
<tr>
	<td align="right">선호하는 <br>카페 타입</td>
	<td>
	<input type="checkbox" name="melo" value="yes" >감성 카페 &nbsp; 
	<input type="checkbox" name="book" value="yes" >만화/보드게임 카페&nbsp; 
	<input type="checkbox" name="bar" value="yes" >칵테일 카페&nbsp;
	<br>
	<input type="checkbox" name="brand" value="yes" >브랜드 카페&nbsp;
	<input type="checkbox" name="view" value="yes" >뷰 카페&nbsp;
	<input type="checkbox" name="theme" value="yes" >테마 카페&nbsp;
	</td>
</tr>
<tr>
	<td align="right">자기소개 :</td>
	<td><textarea name="intro" rows="5" cols="60"></textarea></td>
</tr>
</table>
<br>
<table border="0" width="640">
<tr><td align="center">
	<input type="submit" value="확인">
	<input type="reset" value="다시작성"></td>
</tr>
</table>
	<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div> <!-- end of col1 -->

	<div id="col2">
        <form  name="member_form" method="post" action="insert.php"> 
		<div id="title">
			<img src="../img/title_join.gif">
		</div>

		<div id="form_join">
			<div id="join1">
			<ul>
			<li>* 아이디</li>
			<li>* 비밀번호</li>
			<li>* 비밀번호 확인</li>
			<li>* 이름</li>
			<li>* 닉네임</li>
			<li>* 휴대폰</li>
			<li>&nbsp;&nbsp;&nbsp;이메일</li>
			</ul>
			</div>
			<div id="join2">
			<ul>
			<li><div id="id1"><input type="text" name="id"></div><div id="id2"><a href="#"><img src="../img/check_id.gif" onclick="check_id()"></a></div><div id="id3">4~12자의 영문 소문자, 숫자와 특수기호(_) 만 사용할 수 있습니다.</div></li>
			<li><input type="password" name="pass"></li>
			<li><input type="password" name="pass_confirm"></li>
			<li><input type="text" name="name"></li>
			<li><div id="nick1"><input type="text" name="nick"></div><div id="nick2" ><a href="#"><img src="../img/check_id.gif" onclick="check_nick()"></a></div></li>
			<li><select class="hp" name="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
              </select>  - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3"></li>
			<li><input type="text" id="email1" name="email1"> @ <input type="text" name="email2"></li>
			</ul>
			</div>
			<div class="clear"></div>
			<div id="must"> * 는 필수 입력항목입니다.^^</div>
		</div>

		<div id="button"><a href="#"><img src="../img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
		                 <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
		</div>
	    </form>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</form>
</center>
<footer style="position: relative; top: 400px;">  
	<?php include("Default_Source/footer.php"); ?>
</footer>
</div>
</body>
</html>