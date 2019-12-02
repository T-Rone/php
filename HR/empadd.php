<html>
<head>
    <title>员工信息管理</title>
</head>
  <meta charset="utf-8" />
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
	</div>
</body>
</html>
