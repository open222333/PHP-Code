<?php
// carbon官方文檔
// https://carbon.nesbot.com/docs/
require 'vendor/autoload.php';

use Carbon\Carbon;

// $start = Carbon::yesterday()->startOfDay();
// $end = Carbon::yesterday()->endOfDay()->addDays(0);
$report = array();
$tz = 'Asia/Taipei'; // 時區
$datetime = '2022-02-01 00:00:00';
$start = Carbon::parse($datetime, $tz)->startOfDay();
$end = Carbon::parse($datetime, $tz)->endOfDay()->addDays(0);
$date = $start->toDateString();

$report[$end->toDateString()] = 'aaaaa';

print_r($report);

print "$start\n";
print "$end\n";
print "$date\n";
