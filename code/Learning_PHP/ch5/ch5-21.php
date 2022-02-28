<?php
// 兩個方式從函式中取得全域變數
// $GLOBALS陣列
$dinner = 'Curry Cuttlefish';

function marcrobiotic_dinner()
{
	$dinner = "Some Vegetables";
	print "Dinner is $dinner";
	print " but I'd rather have ";
	print $GLOBALS['dinner'];
	echo "<br>";
}

marcrobiotic_dinner();
print "Regular dinner is: $dinner";
