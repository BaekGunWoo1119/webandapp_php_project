<?php
 		error_reporting(E_ALL);

		ini_set('display_errors', '1');
	
		session_start();

		include "/workspace/wnateam/db.php";  

        //입력 받은 id와 password
        $id=$_POST['id'];
        $pw=$_POST['pw'];
 
        //아이디가 있는지 검사
        $sql = mq("select * from member where id='".$id."'");
 
 
        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($sql)==1) {
 
                $row=mysqli_fetch_assoc($sql);
 				$pwd=$row['pass'];
                //비밀번호가 맞다면 세션 생성
                if(password_verify($pw, $pwd)){
                        $_SESSION['userid']=$id;
                        if(isset($_SESSION['userid'])){
							?>      
							<script>
                        		alert("로그인 되었습니다.");
                       			location.replace("./index.php");
                    		</script>
						
						<?php
						 $userid = $row[id];
		   				$username = $row[name];
		   				$usernick = $row[nick];
		   				$usertype = $row[usertype];
		   				$userpw = $row[pass];

           				$_SESSION['userid'] = $userid;
          				$_SESSION['username'] = $username;
           				$_SESSION['usernick'] = $usernick;
           				$_SESSION['usertype'] = $usertype;
		   				$_SESSION['userpw'] = $userpw;
                        }
                        else{
                                echo "session fail";
                        }
                }
 
                else {
        				?>              
						<script>
                        	alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        	history.back();
                        </script>
        		<?php
                	}
 
        }
 
                else{
						?>              
						<script>
                        	alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        	history.back();
                		</script>
<?php
        			}
?>