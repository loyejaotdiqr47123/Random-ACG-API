<?php

$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
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

$yichang1 = 'https://acg.suyanw.cn/api.php';
$yichang2 = 'https://i3.wp.com/wx4.sinaimg.cn/large/.jpg';

if ($a == $yichang1) {
    echo '异常值1';
    return;
}

if ($a == $yichang2) {
    echo '异常值2';
    return;
}

if (file_exists('pc.txt')) {
    $pc = file_get_contents('pc.txt');
    if (strpos($pc, $a) !== false) {
        echo '已经包含';
        return;
    } else {
        file_put_contents('pc.txt', $a . PHP_EOL, FILE_APPEND);
        echo '写入成功';
        return;
    }
}