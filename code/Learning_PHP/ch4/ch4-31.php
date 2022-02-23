<?php
// 用foreach()遍例多維陣列
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

foreach ($flavors as $culture => $culture_flavors) {
	foreach ($culture_flavors as $flavor => $example) {
		print "A $culture $flavor flavor is $example.";
		echo "<br>";
	}
}
