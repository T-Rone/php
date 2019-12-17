	<?php
	    header("Content-type: text/html; charset=utf-8");
	    $username = $_POST['name'];
	    $password = $_POST['pwd'];
	    $conn = new mysqli('localhost','root','root','hrm_db');
	    if ($conn->connect_error){
	        echo '数据库连接失败！';
	        exit(0);
	    }else{
	        if ($username == ''){
	            echo '<script>alert("请输入用户名！");history.go(-1);</script>';
	            exit(0);
	        }
	        if ($password == ''){
	            echo '<script>alert("请输入密码！");history.go(-1);</script>';
	            exit(0);
	        }
	        $sql = "select loginname,PASSWORD from user_inf where loginname = '$_POST[name]' and PASSWORD = '$_POST[pwd]'";
	        $result = $conn->query($sql);
	        $number = mysqli_num_rows($result);
	        if ($number) {
	            echo '<script>alert("登录成功！");window.location="index.php";</script>';
	        } else {
	            echo '<script>alert("用户名或密码错误！");history.go(-1);</script>';
	        }
	    }
	?>

	
	