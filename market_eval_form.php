<html>
<head>
<?php
	header('Content-Type: text/html; charset=utf-8'); 
	
	session_start();
	$usernick = $_SESSION['usernick'];

	$db = new mysqli("localhost","root","","bbs"); 
	$db->set_charset("utf8");
	
	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
	
?>
<meta charset="UTF-8">
<link href="Assets/styles/Rating_Style.css" rel="stylesheet" type="text/css">
<link href="Assets/styles/ReplyStyle.css" rel="stylesheet" type="text/css">	
<script src = "js/rating.js" type="text/javascript"></script>
</head>
<body>
<?php
	
	$mkt_name = $_GET['market'];
	$coor = $_GET['coor'];
	$sql2 = mq("select * from rating where coor='".$coor."' AND mkt_name='".$mkt_name."'");
    $count = mysqli_num_rows($sql2); //num_rows로 정수형태로 출력
	$sql3 = mq("select * from board1 where coor='".$coor."' AND mkt_name='".$mkt_name."'");
	$count2 = mysqli_num_rows($sql3);
	$sql = mq("select * from rating where mkt_name='".$mkt_name."' AND coor='".$coor."' order by idx desc");
		if($sql->num_rows > 0){
			$res = mq("select mkt_name, coor, avg(rating_star) from rating where mkt_name='".$mkt_name."' AND coor='".$coor."'");
			$avg = mysqli_fetch_assoc($res);
		}
		else{
			$avg = "아직 별점이 없습니다. 여러분께서 직접 평가해주세요!";
		}
	//$sql = mq("select * from '".$mkt_name."'; insert into ".$mkt_name."(coor) values('".$coor."')");
?>
		<h1 style="text-align:center;">
		<?php echo "$mkt_name"; ?>
		</h1>
		<h3 style="text-align:center;">
		<?php if($sql->num_rows > 0){
			$res = mq("select mkt_name, coor, avg(rating_star) from rating where mkt_name='".$mkt_name."' AND coor='".$coor."'");
			while($row = mysqli_fetch_assoc($res)){
   				echo "별점: " ; 
				$avg = sprintf ("%.1f", $row["avg(rating_star)"]); 
				echo ($avg);
				echo "/5.0";
				echo "($count","개)<br>";
				echo "리뷰: " ; 
				if($count2 == 0){
					echo "$count2","개";
					echo " / ";
				}
				else{
				echo "<a href = '/wnateam/search/search_result1.php?market=$mkt_name&coor=$coor'; target='_blank';>$count2","개</a>";
				echo " / ";
				}
				echo "<a href = '/wnateam/board2/write2.php?mkt_name=$mkt_name&coor=$coor'; target='_blank';>(리뷰 작성하러 가기)</a>";
   			}
		?></h3><div style="width: 360px; height:60px; position:relative; left:29%; z-index:3;">
			<a style="margin: -0.8px; padding: 0;"><img src="Assets/images/coffee_rate.png"></a>
			<a style="margin: -4.3px; padding: 0;"><img src="Assets/images/coffee_rate.png"></a>
			<a style="margin: -1.8px; padding: 0;"><img src="Assets/images/coffee_rate.png"></a>
			<a style="margin: -3.5px; padding: 0;"><img src="Assets/images/coffee_rate.png"></a>
			<a style="margin: -2px; padding: 0;"><img src="Assets/images/coffee_rate.png"></a>
			<a style="margin: -3.9px; padding: 0;"><img src="Assets/images/whiteImage.png"></a>	
			</div>
			<div style="width: 355px; height:60px; position:relative; left:29%; top:-60px; background-color: #f0f0f0; z-index:1;">	
			</div>
			<div style="width: calc(<?php echo $avg ?>px * 59.3); height:60px; position:relative; left:29%; top:-120px; background-color: #6f4f28; z-index:2;">	
			</div>
			<h3>
		<?php }
		else{
			echo "아직 별점이 없습니다. 여러분께서 직접 평가해주세요!";
		?><br><br><br><br><br><br><?php	} ?>
		</h3>
	<br>
	<h3 style="text-align:center; position:relative; top:-130px;" >
	<?php echo "이 업체에 대해 여러분의 평가를 남겨주세요!"; ?>
	</h3>
	<div class="wrap" style="position:relative; top:-150px;">
    <form name="reviewform" class="reviewform" method="post" action="eval_form_ok.php?market=<?php echo $mkt_name; ?>&coor=<?php echo $coor; ?>">
        <input type="hidden" name="rate" id="rate" value="0"/>
        <div class="review_rating">
            <div class="warning_msg">별점을 선택해 주세요.</div>
            <div class="rating" style="text-align:center;">
                <!-- 해당 별점을 클릭하면 해당 별과 그 왼쪽의 모든 별의 체크박스에 checked 적용 -->
                <input type="checkbox" name="rating" id="rating1" value="1" class="rate_radio" title="1">
                <label for="rating1"></label>
                <input type="checkbox" name="rating" id="rating2" value="2" class="rate_radio" title="2">
                <label for="rating2"></label>
                <input type="checkbox" name="rating" id="rating3" value="3" class="rate_radio" title="3" >
                <label for="rating3"></label>
                <input type="checkbox" name="rating" id="rating4" value="4" class="rate_radio" title="4">
                <label for="rating4"></label>
                <input type="checkbox" name="rating" id="rating5" value="5" class="rate_radio" title="5">
                <label for="rating5"></label>
            </div>
        </div>
        <div class="review_contents">
            <div class="warning_msg">5자 이상으로 작성해 주세요.</div>
			<b><?php echo $usernick;?></b>
            <textarea rows="10" name="rating_text" class="review_textarea"></textarea>
        </div>   
        <div class="cmd">
			<button type="submit">등록</button>
        </div>
    </form>
	</div>
	<?php	if($sql->num_rows > 0){ 
					while($rating = $sql->fetch_array()){ ?>
		<div class="dap_lo" style = "position:relative; top:-500px;">
		<div><b><?php echo $rating['user_id'];?></b></div>
		<div><b style = "background-color: #ffff00;"><?php echo sprintf ("%.1f", $rating['rating_star']);?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$rating[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $rating['date']; ?></div>
		</div>
	<?php } }
			else{
				echo"아직 평가가 없습니다.";}
		?>
	<br>
	<br>
</body>
</html>