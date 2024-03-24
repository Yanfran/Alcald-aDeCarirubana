<?php
$ip=$_REQUEST["ip"];
$meta = json_encode(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip)));
echo $meta;
?>