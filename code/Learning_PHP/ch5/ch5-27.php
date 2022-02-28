<?php
// 參照另一個檔案 ch5-26.php
require 'ch5-26.php';

$total_bill = restaurant_check(25, 8.875, 20);
$cash = 30;
print "I need to pay with " . payment_method($cash, $total_bill);
