<?php
// 使用$GLOBALS陣列來變更全域變數
$dinner = 'Curry Cuttlefish';

function hungry_dinner()
{
	$GLOBALS['dinner'] .= ' and Deep-Fried Taro';
}

print "Regular dinner is $dinner";
echo "<br>";
hungry_dinner();
print "Hungry dinner is $dinner";
