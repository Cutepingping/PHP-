<?php

require_once('config.php');


//$username=$_POST['username'];
//$password=$_POST['password'];

header("Content-type:text/html;charset=utf-8");

if($conn)
{
    $select=mysqli_select_db($conn,"test");
    if($select)
    {
        if(isset($_POST["subl"]))
        {
            $username=$_POST["usernamel"];
            $password=$_POST["passwordl"];
            if($username==""||$password=="")//判断是否为空
            {
                echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写正确的信息！"."\"".")".";"."</script>";
                echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/login.html"."\""."</script>";
                exit;
            }
            $str="select password from mytest where username="."'"."$username"."'";
            $result=mysqli_query($conn,$str);
      $pass=mysqli_fetch_row($result);
      $pa=$pass[0];
      if($pa==$password)//判断密码与注册时密码是否一致
      {
          echo"登录成功！";
          echo "<script>location='main.php'</script>";
      }
      {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录失败！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/login.html"."\""."</script>";
      }
    }

    }
}
?>