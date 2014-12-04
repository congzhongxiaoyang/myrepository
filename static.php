<?php
if(file_exists('abc.html')&&(time()-filemtime('abc.html')<10))
{
	echo file_get_contents('abc.html');die;
}
ob_start();
echo 'abcdfddddfd';
//ob_flush();
$str=ob_get_contents();
file_put_contents('abc.html',$str);
$a=filemtime('abc.html');

?>