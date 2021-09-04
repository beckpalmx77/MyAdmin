<?php
$string = "ทดสอบ";

$string_e = base64_encode($string);

echo $string;
echo "<br>";
echo $string_e;
echo "<br>";
echo base64_decode($string_e);

echo "<br>";
$url_encode = urlencode($string);
echo "url_encode = " . $url_encode;
echo "<br>";
echo "url_decode = " . urldecode($url_encode);

