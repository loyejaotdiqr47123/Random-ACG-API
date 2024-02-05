<?php
//如何用php判断用户通过电脑端还是手机端访问网站
function isMobile()
{
    //获取用户代理
    $useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    //获取用户代理注释
    $useragent_commentsblock = preg_match('|\(.*?\)|', $useragent, $matches) > 0 ? $matches[0] : '';
    //检查子字符串是否存在
    function CheckSubstrs($substrs, $text)
    {
        foreach ($substrs as $substr)
            if (false !== strpos($text, $substr)) {
                return true;
            }
        return false;
    }
    //手机操作系统列表
    $mobile_os_list = array('Google Wireless Transcoder', 'Windows CE', 'WindowsCE', 'Symbian', 'Android', 'armv6l', 'armv5', 'Mobile', 'CentOS', 'mowser', 'AvantGo', 'Opera Mobi', 'J2ME/MIDP', 'Smartphone', 'Go.Web', 'Palm', 'iPAQ');
    //手机令牌列表
    $mobile_token_list = array('Profile/MIDP', 'Configuration/CLDC-', '160×160', '176×220', '240×240', '240×320', '320×240', 'UP.Browser', 'UP.Link', 'SymbianOS', 'PalmOS', 'PocketPC', 'SonyEricsson', 'Nokia', 'BlackBerry', 'Vodafone', 'BenQ', 'Novarra-Vision', 'Iris', 'NetFront', 'HTC_', 'Xda_', 'SAMSUNG-SGH', 'Wapaka', 'DoCoMo', 'iPhone', 'iPod');
    //检查用户代理中是否包含手机操作系统或手机令牌
    $found_mobile = CheckSubstrs($mobile_os_list, $useragent_commentsblock) ||
        CheckSubstrs($mobile_token_list, $useragent);
    //如果包含，返回true，否则返回false
    if ($found_mobile) {
        return true;
    } else {
        return false;
    }
}
//定义电脑端和手机端文件路径
$pc = 'pc.php';
$pe = 'pe.php';
//判断用户通过电脑端还是手机端访问网站
if (isMobile()) {
    //如果用户通过手机端访问，则重定向到手机端文件
    header("Location:" . $pe);
} else {
    //如果用户通过电脑端访问，则重定向到电脑端文件
    header("Location:" . $pc);
}
?>