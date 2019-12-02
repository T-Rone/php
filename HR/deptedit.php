<html>
<head>
    <meta charset="UTF-8">
    <title>部门信息管理</title>
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
</head>
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
    $sql = "SELECT * FROM dept_inf WHERE ID=".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if($stmt->rowCount()>0){
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("Don^t need to modify");
    }
    ?>
    <form id="editdept" name="editdept" method="post" action="deptaction.php?action=edit">
        <input type="hidden" name="id" id="id" value="<?php echo $stu['ID'];?>"/>
        <table>
         
            <tr>
                <td>部门</td>
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
            </div>
</body>
</html>
