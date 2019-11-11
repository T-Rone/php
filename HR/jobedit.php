<html>
<head>
    <meta charset="UTF-8">
    <title>职位信息管理</title>

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
    $sql = "SELECT * FROM job_inf WHERE ID=".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if($stmt->rowCount()>0){
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("Don^t need to modify");
    }
    ?>
    <form id="editjob" name="editjob" method="post" action="jobaction.php?action=edit">
        <input type="hidden" name="id" id="id" value="<?php echo $stu['ID'];?>"/>
        <table>
         
            <tr>
                <td>职位</td>
                <td><input id="name" name="name" type='text' value="<?php echo $stu['NAME'];?>"/></td>
            </tr>
            <tr>
                <td>简述</td>
                <td><input id="remark" name="remark" type='text' value="<?php echo $stu['REMARK'];?>"/></td>
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
