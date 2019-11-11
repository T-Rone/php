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
			$name=$_POST['name'];
			$sex=$_POST['sex'];
			$dept=$_POST['dept'];
			$phone=$_POST['phone'];
			$card=$_POST['card'];
			$job=$_POST['job'];
			$edc=$_POST['education'];
			$spec=$_POST['spec'];
        //写sql语句
        $sql = "INSERT INTO  employee_inf(DEPT_ID,JOB_ID,NAME,CARD_ID,PHONE,SEX,EDUCATION,SPECIALITY) VALUES ('{$dept}','{$job}','{$name}','{$card}','{$phone}','{$sex}','{$edc}','{$spec}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('insert ok');
                            window.location='emp.php'; //跳转到首页
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
        $sql = "DELETE FROM employee_inf WHERE ID={$id}";
        $pdo->exec($sql);
        header("Location:emp.php");//跳转到首页
        break;
    }
    case "edit" :{   //1.获取表单信息
        
		$id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
		$dept=$_POST['dept'];
		$phone=$_POST['phone'];
		$card=$_POST['card'];
		$job=$_POST['job'];
		$edc=$_POST['education'];
		$spec=$_POST['spec'];
        
		$sql = "UPDATE  employee_inf  SET NAME='{$name}',SEX='{$sex}',DEPT_ID='{$dept}',PHONE='{$phone}',CARD_ID='{$card}',
		 JOB_ID='{$job}',EDUCATION='{$edc}',SPECIALITY='{$spec}'
		 WHERE  ID='{$id}'";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('update ok');window.location='emp.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }
        break;
    }
	
	// case "sel":{
	// 	 $name = $_POST['name'];
	// 	 $sql="SELECT ID,NAME,SEX,EDUCATION,SPECIALITY,DEPT_ID,PHONE,CARD_ID,JOB_ID  FROM employee_inf WHERE NAME='{$name}'";
	// 	 $rw=$pdo->exec($sql);
	// 	 if($rw>0){
	// 	     echo "<script>alert('select ok');window.location='emp.php'</script>";
	// 	 }else{
	// 	     echo "<script>alert('查询失败');window.history.back()</script>";
	// 	 }
	// 	 break;
	// }

}

