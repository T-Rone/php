<html>
	<meta charset="utf-8">
	<script>	
	function doDel(id) {
	             if (confirm("确定要删除么？")) {
	                 window.location = 'jobaction.php?action=del&id='+id;
	            }
	         }
	</script>
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
	<center>
        <?php
		# error_reporting(E_ALL ^ E_NOTICE);
		error_reporting(0);
      //   try {
      //       $pdo = new PDO("mysql:host=localhost;dbname=hrm_db;", "root", "root");
      //   } catch (PDOException $e) {
      //       die("数据库连接失败" . $e->getMessage());
      //   }
      
   //      $pdo->query("SET NAMES 'UTF8'");
   //      $sql = "SELECT * FROM job_inf";
   //      foreach ($pdo->query($sql) as $row) {
			
			// $id=$row['ID'];
			// $name=$row['NAME'];
			// $re=$row['REMARK'];
   //          echo "<tr>";
   //          echo "<td>".$id."</td>";
   //          echo "<td>".$name."</td>";
			// echo "<td>".$re."</td>";
   //          echo "<td>
   //                  <a href='javascript:doDel(".$id.")'>删除</a>
   //                  <a href='jobedit.php?id=($id)'>修改</a>
			// 		<a href='jobadd.php'>增加</a>
   //                </td>";
   //          echo "</tr>";
   //      }
   // 另一种
        @mysql_connect("localhost","root","root") or die("服务器连接失败！");
        @mysql_select_db("hrm_db") or  die("数据库连接失败");
        @mysql_query("SET NAMES utf8");
        $q = "SELECT count(ID) FROM job_inf";
        $num=mysql_result($q,0,0);
        $pagesize=5;
        $maxpage=ceil($num/$pagesize);
        if(isset($_GET['p']))
        {$page=$_GET['p'];}
        else
        {$page=1;}
        
        if(isset($_POST['txtselect']))
        {
        	$uid=$_POST['txtselect'];
        	$sql="select ID,NAME,REMARK FROM job_inf where NAME='".$uid."'";
        }
        else
        {
        	$start=($page-1)*5;
        	$sql="select  ID,NAME,REMARK  FROM job_inf  limit $start,$pagesize";
        }
        $query=mysql_query($sql);
		echo "<h3>浏览职位信息</h3>";
			echo "<table width='600' border='1'>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>职位</th>";
			echo "<th>简述</th>";
			echo "<th>操作</th>";
			echo  "</tr>";  
			while($row=mysql_fetch_array($query))
			{
			$id=$row['ID'];
			$name=$row['NAME'];
			$re=$row['REMARK'];
		    echo "<tr>";
		    echo "<td>".$id."</td>";
		    echo "<td>".$name."</td>";
			echo "<td>".$re."</td>";
		    echo "<td>
		            <a href='javascript:doDel(".$id.")'>删除</a>
		            <a href='jobedit.php?id=($id)'>修改</a>
					<a href='jobadd.php'>增加</a>
		          </td>";
		    echo "</tr>";
		}
		echo " </table>";
		
		echo "</table>";
		echo "<table border=0 align='center' width='500'>";
		echo "<tr  valign='top'>";
		echo "<td><a href='deptadd.php' width=35%>注册</a></td>";
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
		if($page>=$maxpage && $page>1)#尾页肯定比前一页加以
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

    </table>

</center>
</div>
	</body>
</html>
