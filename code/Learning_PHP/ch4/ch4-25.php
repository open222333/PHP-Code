<?php
// 用asort()排序
$meal = array(
	'breakfast' => 'Walnut Bun',
	'lunch' => 'Cashew Nuts and White Mushrooms',
	'snack' => 'Dried Mulberries',
	'dinner' => 'Eggplant with Chili Sauce'
);
print "Before Sorting:\n";
foreach ($meal as $key => $value) {
	print "	\$meal: $key $value";
	echo '<br>';
}

asort($meal);

echo '<br>';
print "After Sorting:\n";
echo '<br>';
foreach ($meal as $key => $value) {
	print "	\$meal: $key $value";
	echo '<br>';
}
