<?php
// 複選匡及單選按鈕預設值 checked
$defaults = array(
	'delivery' => 'yes',
	'size' => 'small'
);

print '<input type="checkbox" name="delivery" value="yes"';
if ($defaults['delivery'] == 'yes') {
	print ' checked';
}
print '> Delivery?';

$checkbox_options = array(
	'small' => 'Small',
	'medium' => 'Medium',
	'large' => 'Large',
);

foreach ($checkbox_options as $value => $label) {
	print '<input type="radio" name="size" value="' . $value . '"';
	if ($defaults['size'] == $value) {
		print ' checked';
	}
	print "> $label";
}
