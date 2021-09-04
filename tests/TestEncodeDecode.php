<?php
$string = "ทดสอบ";

$string_e = base64_encode($string);

echo $string;
echo "<br>";
echo $string_e;
echo "<br>";
echo base64_decode($string_e);
