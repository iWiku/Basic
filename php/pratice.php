<?php
class student{
  // private  $link=null;
  //默认可查询的链接数据库
  private function link($user='root',$pwd='9539',$host='localhost'){
    if($link=mysqli_connect($host,$user,$pwd)){
      return $link;
    }
    die("连接失败");
  }
  //查询函数
  public function Rprint($arr){
    // var_dump ($link);
    $a=new mess();
    $reg=$a->reg($arr);
    $sql="select * from query.allroom where name Regexp '$reg'";
    $res=$this->check($sql);
    while($row=$res->fetch_assoc()){
      echo"<tr>";
      echo"<td>{$row['id']}</td>";
      echo"<td>{$row['name']}</td>";
      echo"<td>{$row['size']}</td>";
      echo"</tr>";
    }
    
  }
  //判断查询语句结果
  protected function check($sql){
    $link=$this->link();    
    $res=mysqli_query($link,$sql);
    if($res === false){
      echo "<br/>查询出错,错误信息如下:";
      echo "<br/>错误信息:".$link->error;
      echo "<br/>错误信息:".$link->errno;
      echo "<br/>查询语句为:".$sql;
      die();
    }
    return $res;
  }
 
}
final class Teacher{
  // protected  
  function link($user='root',$pwd='9539'){
    try{
    $link=new PDO('mysql:host=localhost;dbname=query',$user,$pwd,array(PDO::ATTR_PERSISTENT=>TRUE));
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    }catch (PDOException $e) {
      print "Error!:".$e->getMessage().'<br/>';
      die();
    }
    return $link;
  }
  //进入教师界面,需要调用教师课程查询
  function select($arr){
     foreach($_POST as $key=>$value){
     $$key=$value;
     }//遍历数组生成变量
    $sql="select name,room,class_name,roomid from query.course where  teacherid = $userid";
    $db=$this->link();
    $stmt=$db->query($sql);
    //调用小窗口类
    $mess=new mess(); 
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo"<tr>
      <td>{$row['name']}</td>
      <td>{$row['room']}</td>
      <td>{$row['class_name']}</td>
      <td><a href='#' onclick=window.open('./manage.html?id={$row['roomid']}&userid={$userid}','','height=200,width=800,top=200,left=200,depended=1,directories=no,titlebar=no,memubar=no,scorollbars=yes,resizeable=no,location=1,status=no')>调课 </a> </td>
      </tr>";
    }
     
  } 
  function getCount($arr){
     foreach($_POST as $key=>$value){
     $$key=$value;
     }//遍历数组生成变量
    $sql="select name,room,class_name from query.course where  teacherid = $userid";
    $db=$this->link();
    $stmt=$db->query($sql);
    $num=0;
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      $num++;
    }
    echo $num; 
  } 

  //插入数据方法
  protected function insert($sql){
    try{
       $dbh=$this->link();
      $res=$dbh->exec($sql);
      if(!$res){
        throw new PDOException('插入数据失败');
        }
    }catch (PDOException $e){
      print "Error!:". $e->getMessage() .'<br/>';
      echo "Error!:".$e->getCode().'<br/>';
      // var_dump($e->getTrace());
      die();
    }
    // return $res;
  }
  //删除数据方法
  protected function delete($sql){
    try{
       $dbh=$this->link();
      $res=$dbh->exec($sql);
      if(!$res){
        throw new PDOException('删除数据失败');
        }
    }catch (PDOException $e){
      print "Error!:". $e->getMessage() .'<br/>';
      echo "Error!:".$e->getCode().'<br/>';
      // var_dump($e->getTrace());
      die();
    }
    // return $res;
  }
  //生成sql插入语句
  //生成sql删除语句

  //数据修改,调用删除和插入方法
  public function change($sql1,$sql2){
    try{
      $dbh=$this->link();
      $dbh->beginTransaction();
      $sta=$dbh->query($sql1);
      if(!$sta){
        throw new PDOException('修改失败');
      }
      $sta=$dbh->query($sql2);
      if(!$sta){
        throw new PDOException('删除失败');
      }
      $dbh->commit();
      
    }catch (PDOException $e){
      $dbh->rollback();
      print "Error!:". $e->getMessage() .'<br/>';    
      echo "Error!:".$e->getCode().'<br/>';
      die();
    }
  }



}

//杂乱的功能
class mess{
  static $s_start="2017-02-04";
  // protected
   function weekth($arr){
    // 计算当前第几周
    //开学时间转化为秒数,取天数
    $scday=date('z',strtotime(self::$s_start));
    //传入的时间转化为秒数,去天数
    $today=date('z',strtotime($arr['date']));
    //向上取整为所选周数
    $weekth=ceil(($today-$scday)/7);
    // echo "$scday,$today,$weekth";
    //返回周数
    return $weekth;
  }
  //
  function reg($arr){
    //获得楼的名字
    switch($arr['floor']){
      case 0:
        $floor="";break;
      case 1:
        $floor="勤政楼";break;
      case 2:
        $floor="计科楼";break;
      case 3:
        $floor="物理南楼";break;
      case 4:
        $floor="化学北楼";break;
    }
    //查询的日期为周几
    $week=date('w',strtotime($arr['date']));
    //生成regexp语句
    $reg="$floor".'.*'.$week.'#'.$arr['course'];
    //
    return $reg;
  }
  //查询语句的方法
  function demand($arr){
    $reg=$this->reg($arr);
    $weekth=$this->weekth($arr);
    $sql="select * from week".$weekth ." where Regexp '$reg'";
    // echo $sql;
    return $sql;
  }
  // 创建小窗口的方法
  static function small($a){
    echo "<a href='#' onclick=window.open('./manage.html?id={$a}&userid={}','','height=200,width=800,top=200,left=200,depended=1,directories=no,titlebar=no,memubar=no,scorollbars=yes,resizeable=no,location=1,status=no')>调课</a>";
    
  }
  //教室用户登陆验证
  function sign($arr){
    foreach($arr as $key=>$value){
     $$key=$value;   
    }
    try{
      //准备数据库连接
      $db=new teacher();
      $pdo=$db->link();
      $sql="select pwd from query.teachers where id = $userid";
      $stmt=$pdo->query($sql);
      $row=$stmt->fetch( PDO::FETCH_ASSOC );
      if($row['pwd']==$userpwd){
         echo"<script>alert('登陆成功');</script>";
      }else{
      echo"<script>alert('用户名或密码错误');location.href='SignIn.html'</script>";
      } 
      // var_dump($row);
    }catch (PDOException $e){
      print "Error!:". $e->getMessage() .'<br/>';    
      echo "Error!:".$e->getCode().'<br/>';
      die();

  }
}
}





