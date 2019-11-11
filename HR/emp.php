<html>
	<meta charset="utf-8">
	<script>	
	function doDel(id) {
	             if (confirm("确定要删除么？")) {
	                 window.location = 'empaction.php?action=del&id='+id;
	            }
	         }
	</script>
	
	<style type="text/css">
		.bottom p{
			display:  block;
			text-align: center;
			margin: 0 auto;
		}
	</style>
	<body>
	
	<center>
<h3>浏览员工信息</h3>
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
			$phone=$row['PHONE'];
			$card=$row['CARD_ID'];
			$job=$row['JOB_ID'];
			
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

	</body>
</html>