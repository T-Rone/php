<html>
	<meta charset="utf-8">
	<script>	
	function doDel(id) {
	             if (confirm("确定要删除么？")) {
	                 window.location = 'deptaction.php?action=del&id='+id;
	            }
	         }
	</script>
	<body>
	
	<center>
        <?php
		# error_reporting(E_ALL ^ E_NOTICE);
		
  //       try {
  //           $pdo = new PDO("mysql:host=localhost;dbname=hrm_db;", "root", "root");
  //       } catch (PDOException $e) {
  //           die("数据库连接失败" . $e->getMessage());
  //       }
      
  //       $pdo->query("SET NAMES 'UTF8'");
  //       $sql = "SELECT * FROM dept_inf";
  //       foreach ($pdo->query($sql) as $row) {
			error_reporting(0);
			@mysql_connect("localhost","root","root") or die("服务器连接失败！");
			@mysql_select_db("hrm_db") or  die("数据库连接失败");
			@mysql_query("SET NAMES utf8");
			$q = "SELECT count(ID) FROM dept_inf";
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
				$sql="select ID,NAME,REMARK FROM dept_inf where NAME='".$uid."'";
			}
			else
			{
				$start=($page-1)*5;
				$sql="select  ID,NAME,REMARK  FROM dept_inf  limit $start,$pagesize";
			}
			
			$query=mysql_query($sql);
			echo "<h3>浏览部门信息</h3>";
			echo "<table width='600' border='1'>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>部门</th>";
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
                    <a href='deptedit.php?id=($id)'>修改</a>
					<a href='deptadd.php'>增加</a>
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
			
</center>
	</body>
</html>