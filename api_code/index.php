<?php
echo 'OK';
$today = date('Y/m/d H:i:s');
$path = 'queue.json';
if (file_exists($path)) {
	$data = json_decode(file_get_contents($path), true);
} else {
	$data = array();
};
array_push($data, $today);
file_put_contents(
	$path,
	$context = json_encode($data)
);
