<?php
// 數字或字串欄位 filter_input()函式 FILTER_VALIDATE_INT參數
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 如果validate_form() 回傳錯誤 將錯誤訊息傳給show_form()
	if ($form_errors = validate_form()) {
		show_form($form_errors);
	} else {
		process_form();
	}
} else {
	show_form();
}

// 當表單送出時執行
function process_form()
{
	print "Hello, " . $_POST['my_name'];
	echo "</br>";
	print "email: " . $_POST['email'];
	echo "</br>";
	print "age: " . $_POST['age'];
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
		Your name: <input type="text" name="my_name">
		<br/>
		Your email: <input type="text" name="email">
		<br/>
		Your age: <input type="text" name="age">
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

	// filter_input()篩選輸入資料
	$ok = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
	if (is_null($ok) || ($ok === false)) {
		$errors[] = 'Please enter a vaild age.';
	}

	// my_name長度是不是大於3個字
	if (strlen($_POST['my_name']) < 3) {
		$errors[] = 'Your name must be at least 3 letters long.';
	}

	if (strlen($_POST['email']) == 0) {
		$errors[] = 'You must enter an email address.';
	}

	// 回傳錯誤訊息
	return $errors;
}
