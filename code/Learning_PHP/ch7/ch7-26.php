<?php
// 在<select>選單中加入預設值
$defaults = array(
	'delivery' => 'yes',
	'size' => 'medium',
	'main_dish' => array(
		'taro', 'tripe'
	),
	'sweet' => 'cake',
	'comments' => 'comments'
);

$sweets = array(
	'puff' => 'Sesame Seed Puff',
	'square' => 'Coconut Milk GElatin Square',
	'cake' => 'Brown Sugar Cake',
	'ricemeat' => 'Sweet Rice and Meat'
);

print '<select name="sweet">';
// > 前面是option標籤結尾,$label是選單顯示值
foreach ($sweets as $option => $label) {
	print '<option value="' . $option . '"';
	if ($option == $defaults['sweet']) {
		print ' selected';
	}
	print "> $label</option>\n";
}
print '</select>';
