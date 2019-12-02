<html>
<head>
    <meta charset="UTF-8">
    <title>员工信息管理</title>
<style type="text/css">
		*{
			margin: 0;padding: 0;
		 }
		.header
		{
			width: 100%;
			height: 425px;
			background-image: url(img/1.jpg);
		}
		.menu{
			background-color:  burlywood;
			margin-top: -5px;
		}
		
		ul{
			margin: 0 auto;
			list-style: none;
			height: 30px;
			line-height: 30px;
		}
		ul li
		{
			
			width: 200px;
			text-align: center;
			margin: 0 auto;
			margin-left: 225px;
			float: left;
		}
	 	a
		{
			text-decoration: none;
			margin: 0 auto;
			padding: 6px;
		}
		a:hover{color: #000000;background-color: #DEE1FF;}
		
		.bottom p{
			display:  block;
			text-align: center;
			margin: 0 auto;
		}
		.content
		       {	
				width:100%;
		        margin:0 auto;
		       }
		       .content_1
		       {
		
		           width:100%;border:1px solid #ccc;
		           height:30px;
		       }
		       span
		       {
		        color: #666;
		        font-size:13px;
		        line-height:30px;
		
		       }
		       span a
		       {
		        color: #666;
		        text-decoration:none;
		       }
			   .list_1
		       {
		          height:30px;
		          font-size:13px;
		          color:#666;
		          text-align:center;
		          border:1px solid #ccc;
		       }

	</style>
	<body>
	<div class="box">	
		<div class="header">
				
		</div>
		
		<div class="menu">
			 	<ul>
			 		<li><a href="emp.php" target="ms">员工信息</a></li>
			 		<li><a href="dept.php" target="ms">部门信息</a></li>
					<li><a href="job.php" target="ms">职位信息</a></li>
			 	</ul>
			 		
		</div>
		
		<div class="content">	
		      <div class="content_1">
		      
		                 <form action="empaction.php?action=sel" method="post" accept-charset="utf-8">
		                 <span>你现在所在的位置：<a href="#">首页 </a>》员工||
		                   请输入关键字：<input type="text" name="name"/>
		                   <input type="submit" value="查询">
		                   </span>
		                 </form>
		      
		             </div>
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
</div>
</body>
</html>
