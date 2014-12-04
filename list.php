<?php
header("content-type:text/html;charset=utf-8");
$pdo=new PDO('mysql:dbname=pdo;host=127.0.0.1','root','123123');
$p=@$_GET['p']?$_GET['p']:1;
$title=@$_GET['title'];
$where='';
if($title=='')
{
	$where='1=1';
}else
{
	$where=" title like '%$title%'";
}
$sql="select * from news where $where";
$re=$pdo->query($sql);
//$arr=$re->fetchall();
$cc=$re->rowCount();
$pagesize=5;
$totalpage=ceil($cc/$pagesize);
$start=($p-1)*$pagesize;
$str='';
$sql="select * from news where $where limit $start,$pagesize";
$rea=$pdo->query($sql);
$arr=$rea->fetchall();
if($title==''){
for($i=1;$i<=$totalpage;$i++){

	$str.="<a href='list_".$i.".html'>".$i."</a>&nbsp;&nbsp;&nbsp;";

}
}else{
	for($i=1;$i<=$totalpage;$i++){

	$str.="<a href='search_".$title."_".$i.".html'>".$i."</a>&nbsp;&nbsp;&nbsp;";

}
}

?>
标题：<input type="text" id="title"><input type="button" value="搜索" onclick="search()">
<table border=1>
<tr>
	<td>标题</td>
	<td>发布时间</td>
	<td>内容</td>
</tr>
<?php foreach($arr as $k=>$v){ ?>
<tr>
	<td><?php echo $v['title'];?></td>
	<td><?php echo $v['time'];?></td>
	<td><?php echo $v['content'];?></td>
</tr>
<?php } ?>
</table>
<?php echo $str;
?>
<script type="text/javascript" src='jq.js'>
</script>
<script type="text/javascript">
<!--
	function search(){
		var title=$('#title').val();
		location.href='search_'+title+'.html';
	}
//-->
</script>