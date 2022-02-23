<?php
// 使用ksort()排序
$meal = array(
	'breakfast' => 'Walnut Bun',
	'lunch' => 'Cashew Nuts and White Mushrooms',
	'snack' => 'Dried Mulberries',
	'dinner' => 'Eggplant with Chili Sauce'
);
print "Before Sorting:";
echo "<br>";
foreach ($meal as $key => $value) {
	print "	\$meal: $key $value";
	echo "<br>";
}

ksort($meal);

print "After Sorting:";
echo "<br>";
foreach ($meal as $key => $value) {
	print "	\$meal: $key $value";
	echo "<br>";
}