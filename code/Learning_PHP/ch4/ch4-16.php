<?php
// 找到具有特定值得元素
$meals = array(
	'Walnut Bun' => 1,
	'Cashew Nuts and White Mushrooms' => 4.95,
	'Dried Mulberries' => 3.00,
	'Egglant with Chili Sauce' => 6.50
);
$books = array("The Eater's Guide to Chinese Characters", "How to Cook and Eat in Chinese");
// 這行回傳true: 鍵Dried Mulberries的值是3.00
if (in_array(3, $meals)) {
	print 'There is a $3 item.';
}
// 回傳true
if (in_array("How to Cook and Eat in Chinese", $books)) {
	print "We havae the How to Cook and Eat in Chinese";
}
// 回傳false 因為 in_array() 會區分大小寫
if (in_array("the eater's guide to chinese characters", $books)) {
	print "We havae the Eater's Guide to Chinese Characters";
}
