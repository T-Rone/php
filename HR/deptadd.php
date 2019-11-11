<html>
<head>
    <title>部门信息管理</title>
</head>
  <meta charset="utf-8" />
<body>
<center>
    <h3>增加部门信息</h3>
    <form id="adddept" name="adddept" method="post" action="deptaction.php?action=add">
        <table>
			<tr>
			    <td>部门</td>
			    <td><input id="name" name="name" type="text"/></td>
			
			</tr>
          
            <tr>
                <td>简述</td>
                <td><input id="remark" name="remark" type="text" /></td>
            </tr>
			
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="增加"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>

    </form>
</center>
</body>
</html>
