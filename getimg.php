<?php

function my_log($s) {
	file_put_contents(__DIR__."/log.txt", date("Y-m-d H:i:s ").$s."\r\n", FILE_APPEND);
}

$IMG_DIR = __DIR__."/images/";
header("Cache-Control: no-cache");
header("Access-Control-Allow-Origin: *");
$files = glob($IMG_DIR."*.{jpg,png,gif,jpeg}", GLOB_BRACE);

$next_file =  $files[0];
if ($_REQUEST["last_file"] && $_REQUEST["last_file"] != "" ) {
	foreach ($files as $key => $file) {
		if ( strcmp( basename($file), $_REQUEST["last_file"] ) == 0 )  {
		//	my_log("equal");
			break;
			
		}
	}
	
	
	if (is_file($files[$key+1])){
		$next_file = $files[$key+1];
	}
	
	//my_log("key $key");
}
elseif ( $_REQUEST["get_file"] ) {
	if(is_file($IMG_DIR.$_REQUEST["get_file"])){
		$next_file = $IMG_DIR.$_REQUEST["get_file"]; 
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

 
	
//my_log($next_file);
	$response = [
		"image" => base64_encode(file_get_contents($next_file)),
		"name" => basename($next_file)
	];
	
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
