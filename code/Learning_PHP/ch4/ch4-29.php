<?php
// 存取多維陣列
$meals = array(
	'breakfast' => ['Walnut Bun', 'Coffee'],
	'lunch' => ['Cashew Nuts and White Mushrooms', ['White Mushrooms']],
	'snack' => ['Dried Mulberries', 'Salted Sesame Crab']
);
$lunches = [
	['Chicken', 'Eggplant', 'Rice'],
	['Beef', 'Scallions', 'Noodles'],
	['Eggplant', 'Tofu']
];
$flavors = array(
	'Japanese' => array(
		'hot' => 'wasabi',
		'salty' => 'soy sauce'
	),
	'CHinese' => array(
		'hot' => 'mustard',
		'pepper-salty' => 'prickly ash'
	)
);
print $meals['lunch'][1];
print $meals['snack'][0];
print $lunches[0][0];
print $lunches[2][1];
print $flavors['Japanese']['salty'];
print $flavors['Chinese']['hot'];
