<?php
// 检查pc.txt是否存在，不存在则建新
//if (!file_exists('pc.txt')) {
    //$file = fopen('pc.txt', 'w');
    //fclose($file);
//}
//定义访问ua为手机
$ua = 'Mozilla/5.0 (Linux; Android 10; Mi 9T Pro Build/QKQ1.190825.0; )';
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
// 检查pe.txt是否包含a
if (file_exists('pe.txt')) {
    $pe = file_get_contents('pe.txt');
    if (strpos($pe, $a) !== false) {
    } else {
        // 将回车写入pe.txt，然后再写入a
        file_put_contents('pe.txt', PHP_EOL . $a, FILE_APPEND);
        echo '写入成功';
    }
}