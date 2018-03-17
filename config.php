<?php
//连接数据库
$servername = "localhost";
$DB_DBname = "root";
$DBpwd ="123456";
$dbname = "test";
$conn = new mysqli($servername,$DB_DBname,$DBpwd,$dbname);
if($conn->connect_error){
    die("连接失败: " .$conn->connect_error);
}

?>