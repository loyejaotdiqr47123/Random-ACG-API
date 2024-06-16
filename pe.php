<?php

$fileContent = file_get_contents('pe.txt');
$lines = explode("\n", $fileContent);
$randomLine = $lines[array_rand($lines)];
$sinaImg = str_replace([' ', "\n", "\t", "\r"], '', $randomLine);

$sizeArr = ['kf', 'mw1024', 'mw690', 'bmiddle', 'small', 'thumb180', 'thumbnail', 'square'];
$size = isset($_GET['size']) ? $_GET['size'] : 'kf';
if (!in_array($size, $sizeArr)) {
    $size = 'large';
}
$url = $sinaImg;
$result = ["code" => "200", "acgurl" => $url];
$type = $_GET['return'];

switch ($type) {
    case 'json':
        $path = $url;
        $pathinfo = pathinfo($path);
        $imageInfo = getimagesize($url);
        $result['width'] = $imageInfo[0];
        $result['height'] = $imageInfo[1];
        $result['size'] = $pathinfo['extension'];
        header('Content-type:text/json');
        echo json_encode($result);
        break;
    case 'img':
        $img = file_get_contents($url, true);
        header("Content-Type: image/jpeg;");
        echo $img;
        break;
    default:
        header("Location:".$result['acgurl']);
        break;
}

function str_replace_array($search, $replace, $subject) {
    return str_replace($search, $replace, $subject);
}

?>
