<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>查询空余教室</title>
	<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
	<script src="./bootstrap/jquery.js"></script>
	<script src="./bootstrap/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">


	<form action="">
		<div class="col-sm-3 from-group">
		<label for="">选择日期</label>
		<input type="date"  ></div>
		<div class="col-sm-5 form-group">
		<label for="">选择开始课时</label>
		<select name="" id="" >
			
			<option value="1">第一课时</option>
			<option value="2">第二课时</option>
			<option value="3">第三课时</option>
			<option value="4">第四课时</option>
			<option value="5">第五课时</option>
			<option value="6">第六课时</option>
			<option value="7">第七课时</option>
			<option value="8">第八课时</option>
			<option value="9">第九课时</option>
			<option value="10">第五课时</option>
		</select>
		<label for="">选择结束课时</label>
		<select name="" id="" >
			
			<option value="1">第一课时</option>
			<option value="2">第二课时</option>
			<option value="3">第三课时</option>
			<option value="4">第四课时</option>
			<option value="5">第五课时</option>
			<option value="6">第五课时</option>
			<option value="7">第五课时</option>
			<option value="8">第五课时</option>
			<option value="9">第五课时</option>
			<option value="10">第五课时</option>
		</select>
		</div>

		<div class="col-sm-2 form-group"><input type="submit"  value="查询" class="btn btn-success btn-block "></div>
		<div class="col-sm-2 form-group"> <input type="reset"   value="重置" class="btn btn-info btn-block"></div> 
	


	</form>
	<table class="table table-striped table-hover">
<tr>
	<td>教室ID</td>
	<td>教室名称</td>
	<td>教室规模</td>
	<td>操作</td>
</tr>
<?php
require_once './pratice.php';
$db =new student();
$sql="show databases";
$sql="select * from query.allroom";
echo "<pre>";
$db->getres($sql);
?>

	</table>

	
	
	
	
	</div>
</body>
</html>
