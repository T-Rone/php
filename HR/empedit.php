<html>
<head>
    <meta charset="UTF-8">
    <title>员工信息管理</title>

</head>
<body>
<center>
    <?php
    //1.连接数据库
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=hrm_db;","root","root");
    }catch(PDOException $e){
        die("数据库连接失败".$e->getMessage());
    }
    //2.防止中文乱码
    $pdo->query("SET NAMES 'UTF8'");
    //3.拼接sql语句，取出信息
    $sql = "SELECT * FROM employee_inf WHERE ID=".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if($stmt->rowCount()>0){
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("Don^t need to modify");
    }
    ?>
    <form id="editemp" name="editemp" method="post" action="empaction.php?action=edit">
        <input type="hidden" name="id" id="id" value="<?php echo $stu['ID'];?>"/>
        <table>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="name" type="text" value="<?php echo $stu['NAME']?>"/></td>

            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="1" <?php echo ($stu['SEX']=="1")? "checked" : ""?>/>&nbsp;男
                    <input type="radio" name="sex" value="0"  <?php echo ($stu['SEX']=="0")? "checked" : ""?>/>&nbsp;女
                </td>
            </tr>
			
			<tr>
			    <td>学历</td>
			    <td>
				    <input type="text" name="education" value="<?php echo $stu['EDUCATION'];?>" />
				</td>
			</tr>
            <tr>
                <td>专业</td>
                <td><input id="spec" name="spec" type="text" value="<?php echo $stu['SPECIALITY'];?>"/></td>
            </tr>
            <tr>
                <td>部门</td>
                <td><input id="dept" name="dept" type='number' value="<?php echo $stu['DEPT_ID'];?>"/></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input id="phone" name="phone" type='tel' value="<?php echo $stu['PHONE'];?>"/></td>
            </tr>
            <tr>
                <td>卡号</td>
                <td><input id="card" name="card" type='number' value="<?php echo $stu['CARD_ID'];?>"/></td>
            </tr>
            <tr>
                <td>职位</td>
                <td><input id="job" name="job" type='number' value="<?php echo $stu['JOB_ID'];?>"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="修改"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>

    </form>



</center>
</body>
</html>
