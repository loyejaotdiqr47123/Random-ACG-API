<?php
$pc = file('pc.txt', FILE_IGNORE_NEW_LINES);
$pe = file('pe.txt', FILE_IGNORE_NEW_LINES);
$total_images = count($pc) + count($pe);

$last_updated = date('Y-m-d', max(filemtime('pc.txt'), filemtime('pe.txt')));

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
$host = $protocol . '://' . $_SERVER['HTTP_HOST'];

require_once 'template.php';
?>
