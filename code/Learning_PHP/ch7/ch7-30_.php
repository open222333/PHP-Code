<?php
// 完整表單:顯示預設值、驗證與處理表單
// 這行引入假設FormHelper.php跟目前檔案在同一個目錄下
require 'ch7-29_FormHelper.php';

// 為選單建立選項陣列
// 這些陣列會在display_form(), validate_form(), process_form()
$sweets = array(
	'puff' => 'Sesame Seed Puff',
	'square' => 'Coconut  Milk Gelatin Square',
	'cake' => 'Brown Sugar Cake',
	'ricemeat' => 'Sweet Rice and Neat'
);

$main_dishes = array(
	'cuke' => 'Braised Sea Cucumber',
	'stomach' => "Sauteed Pig's Stomach",
	'tripe' => 'Sauteed Tripe with Wine Sauce',
	'taro' => 'Stewed Pork with Taro',
	'giblets' => 'Baked Giblets with Salt',
	'abalone' => 'Abalone with Marrow and Duck Feet',
);

// 主要頁面的程式邏輯
// - 如果表單是送出的，那就驗證資料，然後處理和顯示
// - 如果表單不是送出，那就顯示
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 如果validate_form()回傳錯誤，把錯誤傳給show_form()
	list($errors, $input) = validate_form();
	if ($errors) {
		show_form($errors);
	} else {
		// 如果送出的資料正確，那接著進行處理
		process_form($input);
	}
} else {
	// 如果不是表單送出，直接顯示
	show_form();
}

function show_form($errors = array())
{
	$defaults = array(
		'delivery' => 'yes',
		'size' => 'medium'
	);
	// 建立有適合預設值的$form物件
	$form = new FormHelper($defaults);

	// 所有 HTML 還有表單的顯示程式碼都清楚地分開存放在不同檔案
	include 'ch7-31_complete-form.php';
}

function validate_form()
{
	$input = array();
	$errors = array();

	// name 是必要欄位
	$input['name'] = trim($_POST['name'] ?? '');
	if (!strlen($input['name'])) {
		$errors[] = 'Please enter your name.';
	}

	// size 是必要欄位
	$input['size'] = $_POST['size'] ?? '';
	if (!in_array($input['size'], ['small', 'medium', 'large'])) {
		$errors[] = 'Please select a size.';
	}

	// sweet 是必要欄位
	$input['sweet'] = $_POST['sweet'] ?? '';
	if (!array_key_exists($input['sweet'], $GLOBALS['sweets'])) {
		$errors[] = 'Please select a valid sweet item.';
	}

	// 主菜有兩個
	$input['main_dish'] = $_POST['main_dish'] ?? array();
	if (count($input['main_dish']) != 2) {
		$errors[] = 'Please select exactly two main dishes.';
	} else {
		// 已知選好兩個主菜了,現在確保兩個主菜都是ok的
		if (!(array_key_exists($input['main_dish'][0], $GLOBALS['main_dishes']) && array_key_exists($input['main_dishes'][1], $GLOBALS['main_dishes'])
		)) {
			$errors[] = 'Please select exactly two valid main dishes.';
		}
	}

	// 如果delivery被選了,那comments就一定要有內容
	$input['delivery'] = $_POST['delivery'] ?? 'no';
	// trim(): 刪除字串前後的空白區域
	$input['comments'] = trim($_POST['comments'] ?? '');
	if (($input['delivery'] == 'yes') && (!strlen($input['comments']))) {
		$errors[] = 'Please enter your address for delivery.';
	}

	return array($errors, $input);
}

function process_form($input)
{
	// 在$GLOBAL['sweets'] 和 $GLOBAL['main_dishes']陣列裡找甜點跟主菜的全名
	$sweet = $GLOBALS['sweets'][$input['sweet']];
	$main_dish_1 = $GLOBALS['main_dishes'][$input['main_dish'][0]];
	$main_dish_2 = $GLOBALS['main_dishes'][$input['main_dish'][1]];
	if (isset($input['delivery']) && ($input['delivery'] == 'yes')) {
		$delivery = 'do';
	} else {
		$delivery = 'do not';
	}
	// 建立點菜訊息
	$message = <<<_ORDER_
	Thank you for your order, {$input['name']}.
	You requested the {$input['size']} size of $sweet, $main_dish_1, and $main_dish_2.
	You $delivery want delivery.
	_ORDER_;
	
	if (strlen(trim($input['comments']))) {
		$message .= 'Your comments: ' . $input['comments'];
	}

	// 把訊息傳送給廚師
	mail('chef@restaurant.example.com', 'New Order', $message);
	// 編碼HTML並送出訊息
	// 把換行字元換成<br/>標籤
	print nl2br(htmlentities($message, ENT_HTML5));
}
