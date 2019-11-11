<html>
<head>
    <title>员工信息管理</title>
</head>
  <meta charset="utf-8" />
<body>
<center>
    <h3>增加员工信息</h3>
    <form id="addemp" name="addemp" method="post" action="empaction.php?action=add">
        <table>
			<tr>
			    <td>姓名</td>
			    <td><input id="name" name="name" type='text' value=""/></td>
			
			</tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="1"/>&nbsp;男
                    <input type="radio" name="sex" value="0"/>&nbsp;女
                </td>
            </tr>
            <tr>
                <td>学历</td>
                <td>
					<select name="education">
					<option value="小学">小学</option>
					<option value="初中">初中</option>
					<option value="高中" selected>高中</option>
					<option value="专科">专科</option>
					<option value="本科">本科</option>
					<option value="研究生">研究生</option>
					</select>
				</td>
            </tr>
            <tr>
                <td>专业</td>
                <td><input id="spec" name="spec" type="text" value=""/></td>
            </tr>
			<tr>
			    <td>部门</td>
			    <td><input id="dept" name="dept" type='number' value=""/></td>
			</tr>
			<tr>
			    <td>电话</td>
			    <td><input id="phone" name="phone" type='tel'/></td>
			</tr>
			<tr>
			    <td>卡号</td>
			    <td><input id="card" name="card" type='number'/></td>
			</tr>
			<tr>
			    <td>职位</td>
			    <td><input id="job" name="job" type='number'/></td>
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
