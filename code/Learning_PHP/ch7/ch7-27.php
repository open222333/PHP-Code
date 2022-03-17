<?php
// 在多選<select>選單中加入預設值
$main_dishes = array(
	'cuke' => 'Braised Sea Cucumber',
	'stomach' => "Sauteed Pig's Stomach",
	'tripe' => 'Sauteed Tripe with Wine Sauce',
	'taro' => 'Stewed Pork with Taro',
	'giblets' => 'Baked Giblets with Salt',
	'abalone' => 'Abalone with Marrow and Duck Feet',
);

print '<select name="main_dish[]" multiple>';

$selected_options = array(
	'cuke' => 'Braised Sea Cucumber',
	'stomach' => "Sauteed Pig's Stomach",
	'tripe' => 'Sauteed Tripe with Wine Sauce',
	'taro' => 'Stewed Pork with Taro',
	'giblets' => 'Baked Giblets with Salt',
	'abalone' => 'Abalone with Marrow and Duck Feet',
);
foreach ($defaults['main_dish'] as $option) {
	$selected_options[$option] = true;
}

// 印出<option>標籤
foreach ($main_dishes as $option => $label) {
	print '<option value="' . htmlentities($option) . '"';
	if (array_key_exists($option, $selected_options)) {
		print ' selected';
		
	}
	print '>' . htmlentities($label) . '</option>';
}
print '</select>';
