<?php
// 使用arsort()排序
$meal = array(
	'breakfast' => 'Walnut Bun',
	'lunch' => 'Cashew Nuts and White Mushrooms',
	'snack' => 'Dried Mulberries',
	'dinner' => 'Eggplant with Chili Sauce'
);
print "Before Sorting:";
echo "<br>";
foreach ($meal as $key => $value) {
	print "\$meal: $key $value";
	echo "<br>";
}

arsort($meal);

print "After Sorting:";
echo "<br>";
foreach ($meal as $key => $value) {
	print "\$meal: $key $value";
	echo "<br>";
}
