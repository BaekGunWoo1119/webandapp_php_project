<html>
<head>
<script src = "../js/member_form.js" type="text/javascript"></script>
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<!-- include summernote css/js -->
<link href="https://wnateam-bieok.run.goorm.io/wnateam/summernote/summernote.min.css" rel="stylesheet">
<script src="https://wnateam-bieok.run.goorm.io/wnateam/summernote/summernote.min.js"></script>
<script src="https://wnateam-bieok.run.goorm.io/wnateam/summernote/lang/summernote-ko-KR.js"></script>
<script src="https://wnateam-bieok.run.goorm.io/wnateam/summernote/lang/summernote-ko-KR.min.js"></script>
	
<script>
$(document).ready(function() {
	//여기 아래 부분
	$('#summernote').summernote({
		  width: 900,
		  height: 500,                 // 에디터 높이
		  minHeight: null,             // 최소 높이
		  maxHeight: null,             // 최대 높이
		  focus: true,                  // 에디터 로딩후 포커스를 맞출지 여부
		  lang: "ko-KR",					// 한글 설정
		  placeholder: '원색적인 모욕/비난글은 관리자에 의해 삭제처리 될 수 있습니다.'	//placeholder 설정
          
	});
	$('.note-fontname').remove();

});
</script>
</head>
<body>
<!-- form 안에 에디터를 사용하는 경우 (보통 이경우를 많이 사용하는듯)-->
<form action="board/modify_ok1.php?idx=<?php echo $bno;?>" method="post">
	<div id="in_title">
    <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
    </div>
    <div class="wi_line"></div>
    <div id="in_name">
		<input type="hidden" name="name" id="uname" value="<?php echo $usernick;?>" />
    </div>
    <div>
    	<textarea id="summernote" name="content"><?php echo $board['content']; ?></textarea>
	</div>
	<input type="hidden" name="pw" id="upw" value="<?php echo $userpw;?>" />
    <div class="bt_se">
    	<button type="submit">글 작성</button>
    </div>
</form>
<div id="map" style="position:absolute; width:1600px; height:1200px; display:none; z-index: 5;"></div>
</body>
</html>