<?
echo 'OK';
$today = date('Y/m/d H:i:s');
$path = 'queue.json';
if (file_exists($path)) {
	$data = json_decode(file_get_contents($path), true);
	$data($today);
} else {
	$data = array()
	$data
};
file_put_contents(
	$path,
	$context = $today
);

echo 'test';