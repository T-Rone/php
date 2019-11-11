<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>HR</title>
	</head>
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
		        table
		       {
		        width:100%;
		        border-collapse:collapse;
		        background:#f2f2f2;
		        margin:auto;
		        text-align:center;
		        margin-top:20px;
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
		  <!-- 
		   		# error_reporting(E_ALL ^ E_NOTICE);
				/*
				$serverName="localhost";
				$connectionInfo=array("Database"=>"emloyee_inf");
				$conn=sqlsrv_connect($serverName,$connectionInfo);
				if($conn==false)
				{ echo "连接失败";var_dump(sqlsrv_errors());exit;}
				$sql="SELECT * FROM employee_inf";
				$result=sqlsrv_query($conn,$sql);
				while($row=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
				{---} -->
			<center>
			<!-- <h3>浏览员工信息</h3> -->
			    <table width="700" border="1">
			        <tr>
			            <th>ID</th>
			            <th>员工</th>
			            <th>性别</th>
						<th>学历</th>
						<th>专业</th>
			            <th>部门</th>
			            <th>电话</th>
			            <th>卡号</th>
						<th>职位</th>
			            <th>操作</th>
			        </tr>
			        <?php
					error_reporting(0);
			  //       try {
			  //           $pdo = new PDO("mysql:host=localhost;dbname=hrm_db;", "root", "root");
			  //       } catch (PDOException $e) {
			  //           die("数据库连接失败" . $e->getMessage());
			  //       } $pdo->query("SET NAMES 'UTF8'");
					@mysql_connect("localhost","root","root") or die("服务器连接失败！");
					@mysql_select_db("hrm_db") or  die("数据库连接失败");
					@mysql_query("SET NAMES utf8");
			        $q = "SELECT count(ID) FROM employee_inf";
					$num=mysql_result($q,0,0);
					$pagesize=4;
					$maxpage=ceil($num/$pagesize);
					if(isset($_GET['p']))
					{$page=$_GET['p'];}
					else
					{$page=1;}
					
					if(isset($_POST['txtselect']))
					{
						$uid=$_POST['txtselect'];
						$sql="select ID,NAME,SEX,EDUCATION,SPECIALITY,DEPT_ID,PHONE,CARD_ID,JOB_ID  FROM employee_inf where NAME='".$uid."'";
					}
					else
					{
						$start=($page-1)*4;
						$sql="select ID,NAME,SEX,EDUCATION,SPECIALITY,DEPT_ID,PHONE,CARD_ID,JOB_ID  FROM employee_inf  limit $start,$pagesize";
					}
					
					$query=mysql_query($sql);
					while($row=mysql_fetch_array($query))
					{
						$id=$row['ID'];
						$name=$row['NAME'];
						$sex=$row['SEX'];
						if($sex==1)
						{$sex='男';}
						else
						{$sex='女';}
						$edc=$row['EDUCATION'];
						$spec=$row['SPECIALITY'];
						$dept=$row['DEPT_ID'];
						
						if($dept==1)
						{$dept='技术部';}
						if($dept==2)
						{$dept='运营部';}
						if($dept==3)
						{$dept='财务部';}
						if($dept==4)
						{$dept='总工办';}
						if($dept==5)
						{$dept='市场部';}
						if($dept==6)
						{$dept='教学部';}
						if($dept==10)
						{$dept='游戏部';}
						$phone=$row['PHONE'];
						$card=$row['CARD_ID'];
						$job=$row['JOB_ID'];
						
						if($job==1)$job='职员';
						if($job==2)$job='Java初级开发工程师';
						if($job==3)$job='Java中级开发工程师';
						if($job==4)$job='Java高级开发工程师';
						if($job==5)$job='系统管理员';
						if($job==6)$job='架构师';
						if($job==7)$job='主管';
						if($job==8)$job='经理';
						if($job==9)$job='总经理';
						if($job==10)$job='游戏设计师';
						
						
			            echo "<tr>";
			            echo "<td>".$id."</td>";
			            echo "<td>".$name."</td>";
			            echo "<td>".$sex."</td>";
						echo "<td>".$edc."</td>";
						echo "<td>".$spec."</td>";
			            echo "<td>".$dept."</td>";
			            echo "<td>".$phone."</td>";
			            echo "<td>".$card."</td>";
						echo "<td>".$job."</td>";
			            echo "<td>
			                    <a href='javascript:doDel(".$id.")'>删除</a>
			                    <a href='empedit.php?id=($id)'>修改</a>
								<a href='empadd.php'>增加</a>
			                  </td>";
			            echo "</tr>";
			        }
			        ?>
			    </table>
				<?php
				echo "</table>";
				echo "<table border=0 align='center' width='500'>";
				echo "<tr  valign='top'>";
				echo "<td><a href='empadd.php' width=35%>注册</a></td>";
				$prew=$page-1;
				$next=$page+1;
				if($page<=1)
				{
					echo "<td width=15% align='right'>首页</td>";
				}
				else
				{
					echo "<td width=15% align='right'><a href='?p=$prew'>上一页</a></td>";
				}
				if($page>$maxpage && $page>1)
				{
					echo "<td width=15%>尾页</td>";
				}
				else
				{
					echo "<td width=15%><a href='?p=$next'>下一页</a></td>";
				}
				echo "<td width=35% align='right'>";
				echo "<form name='frm1' method='post' action=''>";
				echo "<input type='text' name='txtselect' size=8>";
				echo "<input type='submit' value='查询' name='subselect'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				
				?>
			</center>
				
		   		
		          

    	</div>
		<div class="bottom">
							<p><span>版权所有：武汉职业技术学院</span></p>
					        <p><span>学校地址：湖北省武汉市洪山区关山大道463号</span></p>
					        <p><span>校办电话：027-87766779  027-87766773 </span></p>
					        <p><span>招生专线：027-87766666  就业专线：027-87766663</span></p>
					        <p><span>鄂ICP备14001469-1<a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42011102000071" target="_blank">鄂公网安备 42011102000071号</a></span></p>
				
				
		</div>
		
	</div>
	</body>
</html>
