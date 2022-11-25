<html>
<head>
<?php
	header('Content-Type: text/html; charset=utf-8'); 
	
	session_start();
	$usernick = $_SESSION['usernick'];
	$usertype = $_SESSION['usertype'];
	if(!$usernick){
		$usernick = $_SERVER['REMOTE_ADDR'];
	}

	$db = new mysqli("localhost","root","","bbs"); 
	$db->set_charset("utf8");
	
	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
	
?>
<meta charset="UTF-8">
<link href="../Assets/styles/Rating_Style.css" rel="stylesheet" type="text/css">
<link href="../Assets/styles/ReplyStyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://wnateam-bieok.run.goorm.io/wnateam/js/QnA.js"></script>
</head>
<body>
<?php
	error_reporting(E_ALL);

	ini_set('display_errors', '1');
	if($usertype == 'A'){?>
	<br><br><br><br><br><br><br>
		<h3 style="text-align:center; position:relative; top:-130px;" >
		<?php echo "고객님들의 문의사항 목록입니다."; ?>
		</h3>
	<?php
		$sql = mq("select * from QnA order by idx desc");
		if($sql->num_rows > 0){ 
					while($qna = $sql->fetch_array()){ ?>
		<div class="dap_lo" style = "position:relative; width:100%;">
			<div class="dap_to comt_edit"><?php echo nl2br("$qna[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $qna['date']; ?></div>
			<div class="rep_me rep_menu">
				<a href="javascript:doDisplay();">답변</a>
			<div id="myDIV" style ="display:none;">
		<?php 									  
			$sql2 = mq("select * from QnA_res where con_idx = '".$qna['idx']."' order by idx desc");
			if($sql2->num_rows > 0){ 
				while($qna2 = $sql2->fetch_array()){ ?>
			<div class="dap_lo" style = "position:relative; width:100%;">
			<div class="dap_to comt_edit"><?php echo nl2br("$qna2[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $qna2['date']; ?></div></div>
		<?php } } else{?>
			<form name="qnaform" class="reviewform" method="post" action="https://wnateam-bieok.run.goorm.io/wnateam/Default_Source/QnA_res.php">
			<input type="hidden" name="qna_idx" id="rate" value="<?php echo $qna['idx'];?>"/>
			<textarea rows="10" name="qna_text" class="review_textarea"></textarea>
			<div class="cmd">
			<button type="submit">등록</button>
        	</div>
			</form>
			</div>
			</div>
		</div>
	<?php } } } 
		else{
			echo "고객님들의 문의사항이 없습니다.";
		}
	}
	else{
	$sql = mq("select * from QnA where usernick='".$usernick."' order by idx desc");
	//$sql = mq("select * from '".$mkt_name."'; insert into ".$mkt_name."(coor) values('".$coor."')");
?>
	<br><br><br><br><br><br><br>
	<h3 style="text-align:center; position:relative; top:-130px;" >
	<?php echo "여러분의 문의사항을 편하게 작성해주세요!"; ?>
	</h3>
	<div class="wrap" style="position:relative; top:-150px;">
    <form name="reviewform" class="reviewform" method="post" action="https://wnateam-bieok.run.goorm.io/wnateam/Default_Source/QnA_ok.php">
        <div class="review_rating">
            <div class="warning_msg">이 문의사항은 고객님 본인과 관리자만 확인 가능합니다.</div>
        </div>
        <div class="review_contents">
            <div class="warning_msg">5자 이상으로 작성해 주세요.</div>
			<b><?php echo $usernick;?></b>
            <textarea rows="10" name="qna_text" class="review_textarea"></textarea>
        </div>   
        <div class="cmd">
			<button type="submit">등록</button>
        </div>
    </form>
	</div>
	<?php	if($sql->num_rows > 0){ 
					while($qna = $sql->fetch_array()){ ?>
		<div class="dap_lo" style = "position:relative; top:-500px;">
			<div class="dap_to comt_edit"><?php echo nl2br("$qna[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $qna['date']; ?></div>
		</div>
	<?php 
			$sql2 = mq("select * from QnA_res where con_idx '".$qna['date']."'order by idx desc");
			if($sql2->num_rows > 0){ 
				while($qna2 = $sql2->fetch_array()){ ?>
			<div class="dap_lo" style = "position:relative; width:100%;">
			<div class="dap_to comt_edit"><?php echo nl2br("$qna2[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $qna2['date']; ?></div></div>
	<?php } } } }
		else{
			echo "고객님께서 문의하신 문의사항이 없습니다.";
		}
	}?>
	<br>
	<br>
</body>
</html>