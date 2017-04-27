<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>查询结果</title>
	<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
	<script src="./bootstrap/jquery.js"></script>
	<script src="./bootstrap/bootstrap.min.js"></script>
</head>
<body>
	<?php
require_once './pratice.php';
// var_dump($_POST);
if(isset($_POST['submit'])){
  // die('请选择查询条件');
  if(empty($_POST['date'])){
     echo"<script>alert('请选择查询日期');location.href='../lindex.html'</script>";
  }}else{
  echo "<script>alert('forbidden');location.href='../lindex.html'</script>";
}

?>
	<nav class="col-lg-10 text-center" ><h2><?php echo"问候,user" ?></h2></nav>
	<div class="col-lg-2"><h4>教师用户?  <a href="sign in.html">立即登陆</a> </h4></div>
	<div><h2 class="text-center col-sm-12">欢迎使用空教室查询系统</h2></div>
	<!--<div><h4 class="text-center col-sm-12">请选择条件进行查询</h4></div>-->

	<div class="container">
	<form action="result.html" method="post" mutify enctype="multipart/form-data">
		<div class="col-sm-3 from-group">
		<label for="" >选择日期</label>
		<input type="date"  class="btn" name="date"></div>
		<div class="col-sm-3 form-group">
		<label for="" class="">选择楼层</label>

		<select name="floor" id="" class='btn' data-toggle="dropdown" >
			
			<option value="0">全部</option>
			<option value=1>勤政楼</option>
			<option value="2">计科楼</option>
			<option value="3">物理南楼</option>
			<option value="4">化学北楼</option>
		</select>
		</div>
		<div class="col-sm-3 form-group">
		<label for="" class="">选择课时</label>

		<select name="course" id="" class='btn' data-toggle="dropdown" >
			
			<option value="1">早上一二节</option>
			<option value="2">早上三四节</option>
			<option value="3">第三课时</option>
			<option value="4">第四课时</option>
			<option value="5">第五课时</option>
		</select>
		</div>

		<div class="col-sm-2 form-group"><input type="submit" name="submit" value="查询" class="btn btn-success btn-block "></div>
		<div class="col-sm-1 form-group"> <input type="reset"   value="重置" class="btn btn-info btn-block"></div> 
	


	</form>
	<table class="table table-striped">
<tr>
	<td>教室ID</td>
	<td>教室名称</td>
	<td>教室规模</td>
	<td>操作</td>
</tr>
<?php
  //从表单中获取数据
  foreach($_POST as $key=>$value){
     $$key=$value;
  } 
  //  var_dump($_POST);
  $receive=$_POST; 
  $r=new student();
  $r->Rprint($receive);
?>
	</table>
	
	</div>
</body>
</html>
