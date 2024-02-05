<?php
//读取文本
$str = explode("\n", file_get_contents('pe.txt'));
//随机选择一个
$k = rand(0,count($str));
//解析图片
$sina_img = str_re($str[$k]);

//定义尺寸数组
$size_arr = array('kf', 'mw1024', 'mw690', 'bmiddle', 'small', 'thumb180', 'thumbnail', 'square');
//获取尺寸
$size = !empty($_GET['size']) ? $_GET['size'] : 'kf' ;
//判断尺寸是否在尺寸数组中
if(!in_array($size, $size_arr)){
	$size = 'large';
}
//解析图片地址
$url = ''.$sina_img.'';
//解析结果
$result=array("code"=>"200","acgurl"=>"$url");
//Type Choose参数代码
$type=$_GET['return'];
switch ($type)
{   
   
//格式解析                           
case 'json':
//解析图片地址
$path = "$url";
//解析图片信息
$pathinfo = pathinfo($path);
$imageInfo = getimagesize($url);  
//解析图片宽高
$result['width']="$imageInfo[0]";  
$result['height']="$imageInfo[1]";
//解析图片格式
$result['size']="$pathinfo[extension]";    
//输出json格式
header('Content-type:text/json');
echo json_encode($result);
break;
//格式解析                             
case 'img':
//解析图片地址
$img = file_get_contents($url,true);
//使用图片头输出浏览器
header("Content-Type: image/jpeg;");
echo $img;
break;
//IMG
default:
//输出图片地址
header("Location:".$result['acgurl']);
break;
}
//替换空格
function str_re($str){
  $str = str_replace(' ', "", $str);
  $str = str_replace("\n", "", $str);
  $str = str_replace("\t", "", $str);
  $str = str_replace("\r", "", $str);
  return $str;
}