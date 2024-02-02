<?php
// 统计pc.txt和pe.txt行数为a
$pc = file('pc.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$pe = file('pe.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$a = count($pc) + count($pe);
//计算pc.txt文件更改时间的时间缀
$pc_time = filemtime('pc.txt');
//计算pe.txt文件更改时间的时间缀
$pe_time = filemtime('pe.txt');
//比较时间缀，取较大的为b
$b = max($pc_time, $pe_time);
// 将时间缀b转换为正常时间，年月日之间用-相连
$b = date('Y-m-d', $b);
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>随机二次元图片API - acgAPI接口站</title>
		<meta name="keywords" content="三秋API接口站,图库,二次元图片,二次元API,动漫图片API,图片API">
		<meta name="description" content="随机二次元图片API,随机动漫壁纸,每天刷一刷，每次不一样。">
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div>
			<p algin=“center” class="title title2">随机二次元图片API - 三秋API接口站</p>
		</div>
		<div class="container">
			<div class="well">
				<h3>随机二次元图片API</h3>
				<p>目前系统共收录 <?php echo $a; ?> 张图片 API最后更新时间:<?php echo $b; ?></p>
				<p>图片均为https，采用又拍云存储，高速访问</p>
				<p>自判断二次元API基本调用格式：</p>
				<pre><a href="<?php $_SERVER['HTTP_HOST'] ?>/api.php" target="_blank"><?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>/api.php</a></pre>
				<p>PC随机二次元API</p>
				<pre><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>/pc.php" target="_blank"><?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>/pc.php</a></pre>
				<p>PE随机二次元API</p>
				<pre><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>/pe.php" target="_blank"><?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>/pe.php</a></pre>
				<p>请求方式</p>
				<pre>get/post</pre>
				<p>返回格式</p>
				<pre>json/images</pre>
				<p>一叶三秋</p>
				<pre><a href="http://ghser.com" target="_blank">http://ghser.com</a></pre>
			</div>
		</div>
		<div class="bottom">

                    <p>Copyright © 2020 <a href="https://api.ghser.com/" target="_blank" class="one-pan-link-mark">三秋API接口站</a></p>
		</div>
	</body>
</html>