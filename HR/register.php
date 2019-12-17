
<?php
    header("Content-type: text/html; charset=utf-8");
        $username = $_POST['name'];
        $password = $_POST['pwd'];
        $repassword = $_POST['repwd'];
        if ($username == ''){
            echo '<script>alert("请输入用户名！");history.go(-1);</script>';
            exit(0);
        }
        if ($password == ''){
            echo '<script>alert("请输入密码");history.go(-1);</script>';
            exit(0);
        }
        if ($password != $repassword){
            echo '<script>alert("密码与确认密码应该一致");history.go(-1);</script>';
            exit(0);
        }
        if($password == $repassword){
            $conn = new mysqli('localhost','root','root','hrm_db');
            if ($conn->connect_error){
                echo '数据库连接失败！';
                exit(0);
            }else {
                $sql = "select loginname from user_inf where  loginname = '$_POST[name]'";
                $result = $conn->query($sql);
                $number = mysqli_num_rows($result);
                if ($number) {
                    echo '<script>alert("用户名已经存在");history.go(-1);</script>';
                } else {
                    $sql_insert = "insert into user_inf (loginname,password) values('$_POST[name]','$_POST[pwd]')";
                    $res_insert = $conn->query($sql_insert);
                    if ($res_insert) {
                        echo '<script>alert("登录成功！");<script>window.location="index.php";</script>';
                    } else {
                        echo "<script>alert('系统繁忙，请稍候！');</script>";
                    }
                }
            }
        }else{
            echo "<script>alert('提交未成功！'); history.go(-1);</script>";
        }

?>
