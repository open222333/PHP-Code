<?php
// 檢驗<select>選單送出得值
$sweets = array(
	'puff' => 'Sesame Seed Puff',
	'square' => 'Coconut  Milk Gelatin Square',
	'cake' => 'Brown Sugar Cake',
	'ricemeat' => 'Sweet Rice and Neat'
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// list(): 第一元素放置 $form_errors 第二元素放置$input
	list($form_errors, $input) = validate_form();
	// 如果validate_form() 回傳錯誤 將錯誤訊息傳給show_form()
	if ($form_errors) {
		show_form($form_errors);
	} else {
		process_form($input);
	}
} else {
	show_form();
}

// 當表單送出時執行
function process_form()
{
	print $_POST['order'];
}

function generate_options_with_value($options)
{
	$html = '';
	foreach ($options as $value => $option) {
		$html .= "<option value=\"$value\">$option</option>\n";
	}
	return $html;
}

// 顯示表單
function show_form()
{
	$sweets = generate_options_with_value($GLOBALS['sweets']);
	print <<<_HTML_
	<form method="post" action="$_SERVER[PHP_SELF]">
		Your Order: <select name="order">
		$sweets
		</select>
	<br/>
	<input type="submit" value="Order">
	</form>
	_HTML_;
}

function validate_form()
{
	// 建立一個裝錯誤訊息的陣列
	$errors = array();

	// 用陣列裝轉換完的值
	$input = array();
	
	// <select>選單驗證
	$input['order'] = $_POST['order'];
	if (! array_key_exists($input['order'], $GLOBALS['sweets'])) {
		$errors[] = 'Please choose a valid order.';
	}

	// 回傳錯誤訊息
	return array($errors, $input);
}
