<?php
// 變數可視範圍 全域變數 區域變數
$dinner = 'Curry Cuttlefish';

function vegetarian_dinner()
{
	// 與外面的$dinner無關
	print "Dinner is $dinner, or ";
	$dinner = 'Sauteed Pea Shoots';
	print $dinner;
	echo "<br>";
}

function kosher_dinner()
{
	print "Dinner is $dinner, or ";
	$dinner = 'Kung Pgo Chicken';
	print $dinner;
	echo "<br>";
}

print "Vegetarian ";
vegetarian_dinner();
print "Kosher ";
kosher_dinner();
print "Regular dinner is $dinner";
