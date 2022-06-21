<?php

function read_file($path)
{
	$str = null;
	$fp = fopen($path, "r");
	if (filesize($path) > 0) {
		$str = fread($fp, filesize($path));
	}
	return $str;
}
function write_file($str, $path)
{
	$file = fopen($path, "w");
	fwrite($file, "{$str}\n");
	fclose($file);
}
