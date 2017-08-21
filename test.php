<?php

$r = json_decode(file_get_contents("http://localhost/img-next/getimg.php?get_file=".urlencode("dummy-100x100-RedDots.jpg")));
var_dump($r);die;
echo $r->name;
echo "<BR>";
$r = json_decode(file_get_contents(

	"http://localhost/img-next/getimg.php?last_file="
	.urlencode($r->name)
	));
echo $r->name;