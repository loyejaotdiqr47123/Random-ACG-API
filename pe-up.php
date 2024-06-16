<?php
$ua = 'Mozilla/5.0 (Linux; Android 10; Mi 9T Pro Build/QKQ1.190825.0; )';
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

$a1 = 'https://acg.suyanw.cn/api.php';
if ($a == $a1) {
    echo '异常值1';
    exit;
}

$a2 = 'https://i3.wp.com/wx4.sinaimg.cn/large/.jpg';
if ($a == $a2) {
    echo '异常值2';
    exit;
}

if (file_exists('pe.txt')) {
    $pe = file_get_contents('pe.txt');
    if (strpos($pe, $a) !== false) {
        echo '已存在';
        exit;
    } else {
        file_put_contents('pe.txt', PHP_EOL . $a, FILE_APPEND);
        echo '写入成功';
        exit;
    }
}
?>
