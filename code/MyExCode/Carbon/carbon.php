<?php
// carbon官方文檔
// https://carbon.nesbot.com/docs/
require 'vendor/autoload.php';

use Carbon\Carbon;

// $start = Carbon::yesterday()->startOfDay();
// $end = Carbon::yesterday()->endOfDay()->addDays(0);

$tz = 'Asia/Taipei'; // 時區
$datetime = '2022-02-01 00:00:00';
$start = Carbon::parse($datetime, $tz)->startOfDay();
$end = Carbon::parse($datetime, $tz)->endOfDay()->addDays(0);

print "$start\n";
print "$end\n";
