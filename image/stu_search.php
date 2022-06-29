<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生管理系统</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="../lib/layui-v2.6.3/css/layui.css" media="all">
    <link rel="stylesheet" href="../css/layuimini.css?v=2.0.4.2" media="all">
    <link rel="stylesheet" href="../css/themes/default.css" media="all">
    <link rel="stylesheet" href="../lib/font-awesome-4.7.0/css/font-awesome.min.css" media="all">

    <style id="layuimini-bg-color">
    </style>
<style>
    .layui-top-box {padding:40px 20px 20px 20px;color:#fff}
    .panel {margin-bottom:17px;background-color:#fff;border:1px solid transparent;border-radius:3px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}
    .panel-body {padding:15px}
    .panel-title {margin-top:0;margin-bottom:0;font-size:14px;color:inherit}
    .label {display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em;margin-top: .3em;}
    .layui-red {color:red}
    .main_btn > p {height:40px;}
</style>
</head>
<body>
<div class="layuimini-container">
        <div class="layuimini-main">
            <div class="layui-box">	
                <div class="layui-row layui-col-space10">
                    <div class="layui-col-md15">
						<div>
							<span>
								<h3 align="center">亲(づ￣3￣)づ╭❤～，为您查询到的数据为~~~~</h3>
							</span>
						</div>
					
                        <table class="layui-table">
                            <colgroup>
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>学号</th>
                                        <th>姓名</th>
                                        <th>性别</th>
                                        <th>年龄</th>
                                        <th>地区</th>
                                        <th>民族</th>
                                        <th>课程编号</th>
										<th>操作</th>
                                    </tr>
                                </thead>
							   
							   <?php
                               header('Content-type:text/html;charset=utf-8');  //设置字符编码
                                   //链接数据库
                               	include '../pdo.php';
                               try {
								//模糊查询
								$key = $_GET['key'];
								$sql = "SELECT *
										FROM `tb_student`
										WHERE 
										(`studentNo` LIKE '%$key%' 
										OR `studentName` LIKE '%$key%' 
										OR `sex` LIKE '%$key%' 
										OR `native` LIKE '%$key%' 
										OR `nation` LIKE '%$key%' 
										OR `classNo` LIKE '%$key%')";
								$result=$pdo->prepare($sql);
                    
					
					if ($result->execute()) {
										while ($row = $result->fetch()) {
										    echo "<tbody>";
										    echo "<tr>";
											echo "<td>".$row['studentNo']."</td>";
											echo "<td>".$row['studentName']."</td>";
											echo "<td>".$row['sex']."</td>";
											echo "<td>".$row['birthday']."</td>";
											echo "<td>".$row['native']."</td>";
											echo "<td>".$row['nation']."</td>";
											echo "<td>".$row['classNo']."<br />"."</td>";
											
											
											//{$row['studentNo']} 以数组的形式来传参，，，{}  获取ID
											echo "<td><a href='./add.php'>增加</a> || <a href='del.php?uid={$row['studentNo']}'>删除</a> 
											|| || <a href='./upp.php?uid={$row['studentNo']}'>修改</a> || <a href='select.php'>查询</a>|| <a href='./select.php'>返回</a></td>";
											echo "</tr>";
											echo "</tr>";
											echo "</tbody>";
										}
									}
								}
								catch(PDOException $e) {
									echo 'PDO Exception Caught';
									echo 'Error with the database:<br />';
									echo 'SQL Query:',$sql;
									echo 'Connection failed:'.$e->getMessage();
								}
								echo  '</table>';
					?>   
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../lib/layui-v2.6.3/layui.js" charset="utf-8"></script>
	<script src="../lib/layui-v2.5.5/layui.js" charset="utf-8"></script>
	<script src="../js/lay-config.js?v=2.0.0" charset="utf-8"></script>
	</body>
	</html>