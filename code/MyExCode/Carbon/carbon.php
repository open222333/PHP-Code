<?php
// carbon官方文檔
// https://carbon.nesbot.com/docs/
require 'vendor/autoload.php';

use Carbon\Carbon;

$start = Carbon::yesterday()->startOfDay();
$end = Carbon::yesterday()->endOfDay();

$tz = '	Asia/Taipei'; // 時區
$datetime = '2022-02-01 00:00:00';
$test = Carbon::parse($datetime, $tz);
print "now test: $test\n";
$temp_start_test = Carbon::parse($datetime, $tz);
$test->subDay(2);
// $test2 = $test->subDay(1);

print "$start\n";
print "$end\n";
print "$temp_start_test\n";
print "after test: $test\n";
// print "$test2\n";
