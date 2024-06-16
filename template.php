<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>随机二次元图片API</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div class="container">
        <h2>随机二次元图片API</h2>
        <div class="well">
            <h3>API文档</h3>
            <p>共有 <?php echo $total_images; ?> 张图片<br>图片最后更新:<?php echo $last_updated; ?></p>
            <p>调用二次元API的基本格式是：</p>
            <pre><code><?php echo $host; ?>/api.php</code></pre>
            <p>PC随机二次元API</p>
            <pre><code><?php echo $host; ?>/pc.php</code></pre>
            <p>PE随机二次元API</p>
            <pre><code><?php echo $host; ?>/pe.php</code></pre>
            <p>请求：GET/POST<br>响应：JSON/images</p>
        </div>
    </div>
    <div class="bottom">
        <p><a href="https://github.com/loyejaotdiqr47123/Random-ACG-API">开源仓库</a></p>
        <p>ICP备案号：<a href="https://beian.miit.gov.cn" target="_blank">吉ICP备2024010762号-2</a></p>
    </div>
</body>
</html>
