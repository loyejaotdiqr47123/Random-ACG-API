<?php
// 检查pc.txt是否存在，不存在则建新
//if (!file_exists('pc.txt')) {
    //$file = fopen('pc.txt', 'w');
    //fclose($file);
//}
//定义访问ua为pc
$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
//访问https://acg.suyanw.cn/api.php，并且获取访问后302的地址为a
$url = 'https://acg.suyanw.cn/api.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_REFERER, 'https://acg.suyanw.cn/');
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
$a = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
// 检查pc.txt是否包含a
if (file_exists('pc.txt')) {
    $pc = file_get_contents('pc.txt');
    if (strpos($pc, $a) !== false) {
    } else {
        // 将a写入pc.txt，并且写入回车
        file_put_contents('pc.txt', $a . PHP_EOL, FILE_APPEND);
        echo '写入成功';
    }
}