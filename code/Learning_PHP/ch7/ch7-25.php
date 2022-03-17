<?php
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
		'comments' => 'comments'
	);
}
// 設定文字區預設值
print '<textarea name="comments">';
print htmlentities($defaults['comments']);
print '</textarea>';
