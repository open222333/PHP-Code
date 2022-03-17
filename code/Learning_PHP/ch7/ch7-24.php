
<?php
// 設定文字欄預設值
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$defaults = $_POST;
} else {
	$defaults = array(
		'delivery' => 'yes',
		'size' => 'medium',
		'main_dish' => array(
			'taro', 'tripe'
		),
		'sweet' => 'cake',
		'my_name' => 'my_name'
	);
}

print '<input type="text" name="my_name" value="' . htmlentities($defaults['my_name']) . '">';
