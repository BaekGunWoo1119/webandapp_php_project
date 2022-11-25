<!DOCTYPE html>
<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	$coor = $_GET['coor'];
?>
<html>
<head>
<meta charset="utf-8">
<title>마커 표시하기</title>
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=5eac921756bd2b0036b7b7ce8d947e42&libraries=services"></script>   
</head>
<body>
<?php if(!$coor){
	echo "지도 서비스 -> 원하는 가게 마커 클릭 -> 리뷰하러가기 를 통해 원하는 가게의 지도를 띄워보세요!";
	}
	else{?>
<div id="staticMap" style="width:600px;height:350px;"></div>
<script>
// 이미지 지도에서 마커가 표시될 위치입니다 
var markerPosition  = new kakao.maps.LatLng<?php echo $coor;?>; 

// 이미지 지도에 표시할 마커입니다
// 이미지 지도에 표시할 마커는 Object 형태입니다
var marker = {
    position: markerPosition
};

var staticMapContainer  = document.getElementById('staticMap'), // 이미지 지도를 표시할 div  
    staticMapOption = { 
        center: new kakao.maps.LatLng<?php echo $coor;?>, // 이미지 지도의 중심좌표
        level: 3, // 이미지 지도의 확대 레벨
        marker: marker // 이미지 지도에 표시할 마커 
    };    

// 이미지 지도를 생성합니다
var staticMap = new kakao.maps.StaticMap(staticMapContainer, staticMapOption);
</script>
<h3>위 이미지를 복사해서 본문에 붙여넣으세요!</h3>
<?php } ?>
</body>
</html>