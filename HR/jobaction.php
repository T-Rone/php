<?php
//1.连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=hrm_db;", "root", "root");

} catch (PDOException $e) {
    die("数据库连接失败" . $e->getMessage());
}
//2.防止中文乱码
$pdo->query("SET NAMES 'UTF8'");
//3.通过action的值进行对应操作
switch ($_GET['action']) {
    case 'add':{   //增加操作
			#$id=$_POST['id'];
			$name=$_POST['name'];//根据标签name传值
			$remark=$_POST['remark'];
        //写sql语句
        $sql = "INSERT INTO  job_inf(NAME,REMARK) VALUES ('{$name}','{$remark}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('insert ok');
                            window.location='job.php'; //跳转到首页
                 </script>";
        } else {
            echo "<script> alert('insert false');
                            window.history.back(); //返回上一页
                 </script>";
        }
        break;
    }
    case "del": {    //1.获取表单信息
        $id = $_GET['id'];
        $sql = "DELETE FROM job_inf WHERE ID={$id}";
        $pdo->exec($sql);
        header("Location:job.php");//跳转到首页
        break;
    }
    case "edit" :{   //1.获取表单信息
		$id=$_POST['id'];
        $name=$_POST['name'];
        $remark=$_POST['remark'];
		$sql = "UPDATE  job_inf  SET NAME='{$name}',REMARK='{$remark}' WHERE  ID='{$id}'";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('update ok');window.location='job.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }
        break;
    }

}

