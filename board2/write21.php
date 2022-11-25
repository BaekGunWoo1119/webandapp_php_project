<html>
<head>
<meta charset="UTF-8">
<?php
	$mkt_name = $_GET['mkt_name'];
	$coor = $_GET['coor'];
?>
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
	
var buttons = $.summernote.options.buttons;
        // 툴바에 표시할 버튼 넣기
        // ['배열이름', ['버튼1', '버튼2']]
        $.summernote.options.toolbar.push([
            "CustomButton",
            [
                "MapPlus"
            ],
        ]);
		
	var MapPlus = function (context) {
            var ui = $.summernote.ui;
            // 이벤트 지정
            var button = ui.button({
                // 툴바 표시 내용
                contents: '<i class="fa fa-pencil"/> 지도 띄우기',
                // 툴바 툴팁 표현 내용 
                tooltip: "지도 띄우기",
                // 클릭시 이벤트 작동
                click: function () {
					window.open("https://wnateam-bieok.run.goorm.io/wnateam/board2/map_write.php?coor=<?php echo $coor;?>", "_blank", "width=600px; height=600px;")
				},
  			});
            return button.render();
        };
        // 툴바의 버튼 이벤트 붙이기
        buttons.MapPlus = MapPlus;
</script>
</head>
<body>
<!-- form 안에 에디터를 사용하는 경우 (보통 이경우를 많이 사용하는듯)-->
<form action="board2/write_ok2.php?mkt_name=<?php echo $mkt_name; ?>&coor=<?php echo $coor; ?>" method="post">
	<div id="in_title">
    <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
    </div>
    <div class="wi_line"></div>
    <div id="in_name">
		<input type="hidden" name="name" id="uname" value="<?php echo $usernick;?>" />
    </div>
    <div>
    	<textarea id="summernote" name="content"></textarea>
	</div>
	<input type="hidden" name="pw" id="upw" value="<?php echo $userpw;?>" />
    <div class="bt_se">
    	<button type="submit">글 작성</button>
    </div>
</form>
<div id="map" style="position:absolute; width:1600px; height:1200px; display:none; z-index: 5;"></div>
</body>
</html>