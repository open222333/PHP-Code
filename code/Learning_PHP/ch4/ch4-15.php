<?php
// 找到具有特定鍵的元素
$meals = array(
	'Walnut Bun' => 1,
	'Cashew Nuts and White Mushrooms' => 4.95,
	'Dried Mulberries' => 3.00,
	'Egglant with Chili Sauce' => 6.50
);
$books = array("The Eater's Guide to Chinese Characters", "How to Cook and Eat in Chinese");
// 這行回傳true
if (array_key_exists('Shrimp Puffs', $meals)) {
	print "Yes, we have Shirmp Puffs";
}
// 這行回傳false
if (array_key_exists("Steak Sandwich", $meals)) {
	print "We have a Steak Sandwich";
}
// 這行回傳true
if (array_key_exists(1, $books)) {
	print "Element 1 is How to Cook and Eat in Chinese";
}
