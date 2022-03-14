<?php
// 顯示<select>選單

// 顯示表單
$sweets = array(
	'Sesame Seed Puff',
	'Coconut  Milk Gelatin Square',
	'Brown Sugar Cake',
	'Sweet Rice and Neat'
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// list(): 第一元素放置 $form_errors 第二元素放置$input
	list($form_errors, $input) = validate_form();
	// 如果validate_form() 回傳錯誤 將錯誤訊息傳給show_form()
	if ($form_errors) {
		show_form($form_errors);
	}
	// else {
	// 	process_form($input);
	// }
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
	// print <<<_HTML_
	// <form method="POST" action="$_SERVER[PHP_SELF]">
	// 	Your name: <input type="text" name="name">
	// 	<br/>
	// 	Your email: <input type="text" name="email">
	// 	<br/>
	// 	Your age: <input type="text" name="age">
	// 	<br/>
	// 	Your price: <input type="text" name="price">
	// 	<br/>
	// 	<input type="submit" value="Say Hello">
	// </form>
	// _HTML_;

	$sweets = generate_options($GLOBALS['sweets']);
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

// 驗證表單
function validate_form()
{
	// 建立一個裝錯誤訊息的陣列
	$errors = array();

	// 用陣列裝轉換完的值
	$input = array();

	// <select>選單驗證
	$input['order'] = $_POST['order'];
	if (! in_array($input['order'], $GLOBALS['sweets'])) {
		$errors[] = 'Please choose a valid order.';
	}

	// 作一個代表6個月前的日期物件
	$range_start = new DateTime();
	// 作一個代表現在的日期物件
	$range_end = new DateTime();
	// $_POST['year']是4位數年份
	// $_POST['month']是2位數月份
	// $_POST['day']是2位數日期
	$input['year'] = filter_input(
		INPUT_POST,
		'year',
		FILTER_VALIDATE_INT,
		array('options' => array(
			'min_range' => 1900,
			'max_range' => 2100
		))
	);

	$input['month'] = filter_input(
		INPUT_POST,
		'month',
		FILTER_VALIDATE_INT,
		array('options' => array(
			'min_range' => 1,
			'max_range' => 12
		))
	);

	$input['day'] = filter_input(
		INPUT_POST,
		'day',
		FILTER_VALIDATE_INT,
		array('options' => array(
			'min_range' => 1,
			'max_range' => 31
		))
	);
	// checkdate()確認用來指定的日期搭配特定年月是不是正確的
	if ($input['year'] && $input['month'] && $input['day'] && checkdate($input['year'], $input['month'], $input['day'])) {
		$submitted_date = new DateTime(strtotime(
			$input['year'] . '-' . $input['month']  . '-' . $input['day']
		));

		if (($range_start > $submitted_date) || ($range_end < $submitted_date)) {
			$errors[] = 'Please choose a date less than six months old.';
		}
	} else {
		// 送出類似 2月31日 這種日期
		$errors[] = 'Please enter a vaild date.';
	}


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

	// FILTER_VALIDATE_EMAIL 檢查郵件格式
	$input['email'] = filter_input(
		INPUT_POST,
		'email',
		FILTER_VALIDATE_EMAIL
	);
	if (!$input['email']) {
		$errors[] = 'Please enter a valid email address.';
	}
	// if (strlen($_POST['email']) == 0) {
	// 	$errors[] = 'You must enter an email address.';
	// }

	// 回傳錯誤訊息
	return array($errors, $input);
}

// 顯示<select>選單
function generate_options($options)
{
	$html = '';
	foreach ($options as $option) {
		$html .= "<option>$option</option>\n";
	}
	return $html;
}
