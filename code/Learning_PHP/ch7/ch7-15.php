<?php
// 檢查整數值域 - ch7-14.php後續
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
	print "Hello, " . $_POST['name'];
	echo "</br>";
	print "email: " . $_POST['email'];
	echo "</br>";
	print "age: " . $_POST['age'];
	echo "</br>";
	print "price: " . $_POST['price'];
}

// 顯示表單
function show_form($errors = array())
{
	// 如果有錯誤就印出
	if ($errors) {
		print 'Please correct these errors:<ul><li>';
		print implode('</li><li>', $errors);
		print '</li></ul>';
	}
	print <<<_HTML_
	<form method="POST" action="$_SERVER[PHP_SELF]">
		Your name: <input type="text" name="name">
		<br/>
		Your email: <input type="text" name="email">
		<br/>
		Your age: <input type="text" name="age">
		<br/>
		Your price: <input type="text" name="price">
		<br/>
		<input type="submit" value="Say Hello">
	</form>
	_HTML_;
}

// 驗證表單
function validate_form()
{
	// 建立一個裝錯誤訊息的陣列
	$errors = array();

	// 用陣列裝轉換完的值
	$input = array();

	// 檢查一個必須有的欄位是否被輸入空白
	// 使用空連結運算子避免$_POST['name']是空值
	$input['name'] = trim($_POST['name'] ?? '');
	if (strlen($input['name']) == 0) {
		$errors[] = 'Your name is required.';
	}

	// filter_input()篩選輸入資料 FILTER_VALIDATE_INT參數驗證整數
	$input['age'] = filter_input(
		INPUT_POST,
		'age',
		FILTER_VALIDATE_INT,
		array('options' => array('min_range' => 18, 'max_range' => 65))
	);
	if (is_null($input['age']) || ($input['age'] === false)) {
		$errors[] = 'Please enter a vaild age between 18 and 65.';
	}

	// filter_input()篩選輸入資料 FILTER_VALIDATE_FLOAT參數驗證浮點數
	$input['price'] = filter_input(
		INPUT_POST,
		'price',
		FILTER_VALIDATE_FLOAT
	);
	if (is_null($input['price']) || ($input['price'] === false) || ($input['price'] < 10.00) || ($input['price'] > 50.00)) {
		// FILTER_VALIDATE_FLOAT不支援min_range, max_range 需自己實作
		$errors[] = 'Please enter a vaild price between $10 and $50.';
	}

	// name長度是不是大於3個字
	if (strlen($_POST['name']) < 3) {
		$errors[] = 'Your name must be at least 3 letters long.';
	}

	if (strlen($_POST['email']) == 0) {
		$errors[] = 'You must enter an email address.';
	}

	// 回傳錯誤訊息
	return array($errors, $input);
}
