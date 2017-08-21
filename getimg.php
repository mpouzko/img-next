<?php

$IMG_DIR = __DIR__."/images/";

header("Access-Control-Allow-Origin:*");
$files = glob($IMG_DIR."*.{jpg,png,gif,jpeg}", GLOB_BRACE);
$next_file = false;
if ($_REQUEST["last_file"] && $_REQUEST["last_file"] != "" ) {
	foreach ($files as $key => $file) {
		if ( strcmp( basename($file), $_REQUEST["last_file"]) == 0 )  {
			break;
		}
	}
	$next_file = current($files);
}
elseif ( $_REQUEST["get_file"] ) {
	if(is_file($IMG_DIR.$_REQUEST["get_file"])){
		$next_file = $IMG_DIR.$_REQUEST["get_file"]; 
	}

	else {
		$next_file = $files[0];
	}
	
}

/*elseif (is_file(__DIR__."/next.txt")) {
	$last_file = file_get_contents(__DIR__."/next.txt");
	foreach ($files as $key => $file) {
		if ( strcmp( basename($file), $last_file) == 0 )  {
			break;
		}
	}
	$next_file = current($files);
}*/

else {
		$next_file = $files[0];
	}
	

	$response = [
		"image" => base64_encode(file_get_contents($next_file)),
		"name" => basename($next_file)
	];
	header("Access-Control-Allow-Origin: https://render.crowdflower.io");
	header('Content-Type: application/json');
	echo json_encode($response);
/*if (!$_REQUEST["last_file"]) {
	file_put_contents(__DIR__."/next.txt", basename($next_file));
}*/
	/*header('Content-Type: image/jpeg');


	//header('image: '.$key);
	file_put_contents(__DIR__."/next.txt", basename($next_file));
	readfile($next_file);
	exit;
	*/
