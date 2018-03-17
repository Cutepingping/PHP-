
<?php
$servername = "localhost";
$DB_DBname = "root";
$DBpwd ="123456";
$dbname = "test";
$conn = new mysqli($servername,$DB_DBname,$DBpwd,$dbname);

header("Content-type:text/html;charset=utf-8");
if($conn)
{
    //echo"链接数据库成功";
    $select=mysqli_select_db($conn,"test");//选择数据库
    if($select)
    {
        //echo"选择数据库成功！";
        if(isset($_POST["sub"]))
        {
            $name=$_POST["username"];
            $password1=$_POST["password"];//获取表单数据
            $password2=$_POST["password2"];
            if($name==""||$password1=="")//判断是否填写
            {
                echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完成！"."\"".")".";"."</script>";
                echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/register.html"."\""."</script>";
                exit;
            }
            if($password1==$password2)//确认密码是否正确
            {
                $str="select count(*) from mytest where username="."'"."$name"."'";
                $result=mysqli_query($conn,$str);
                $pass=mysqli_fetch_row($result);
                $pa=$pass[0];
                if($pa==1)//判断数据库表中是否已存在该用户名
                {

                    echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."该用户名已被注册"."\"".")".";"."</script>";
                    echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/register.html"."\""."</script>";
                    exit;
                }


                $sql="insert into mytest values("."\""."$name"."\"".","."\""."$password1"."\"".")";//将注册信息插入数据库表中
                //echo"$sql";
                mysqli_query($conn,$sql);
                $close=mysqli_close($conn);
                if($close)
                {
                    //echo"数据库关闭";
                    //echo"注册成功！";
                    echo "<script>location='main.php'</script>";
                }
            }
            else
            {
                echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密码不一致！"."\"".")".";"."</script>";
                echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/register.html"."\""."</script>";
            }
        }
    }
}
?>