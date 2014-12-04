<?php
header("content-type:text/html;charset=utf-8");

$id=$_GET['id'];
$pdo=new PDO('mysql:dbname=pdo;host=127.0.0.1','root','123123');
$sql="select jian,time,author from xiaomi where id=$id";
$re=$pdo->query($sql);
$arr=$re->fetch();

echo '文章：';print_r($arr['jian']);echo '<br>';
echo '作者：'.$arr['author'];echo '<br>';
echo '时间：'.$arr['time'];
?>