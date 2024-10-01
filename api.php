<?php
require_once 'vendor/autoload.php';  // 引入 Mobile_Detect 库

use Detection\MobileDetect;

// 设置内容类型为 HTML，编码为 UTF-8
header('Content-Type: text/html; charset=utf-8');

// 创建 MobileDetect 实例
$detect = new MobileDetect();

function isMobile(MobileDetect $detect) {
    // 如果是平板或移动设备，都视为移动设备
    return $detect->isMobile() || $detect->isTablet();
}

$pc = 'pc.php';
$pe = 'pe.php';

// 根据设备类型设置重定向路径
$redirectUrl = isMobile($detect) ? $pe : $pc;

// 设置 HTTP 状态码 302 并重定向
http_response_code(302);
header("Location: $redirectUrl");

exit;  // 确保脚本停止执行
