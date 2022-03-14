<?php
// 驗證表單資料
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (validate_form()) {
		process_form();
	} else {
		show_form();
	}
} else {
	show_form();
}

// 當表單送出時執行
function process_form()
{
	print "Hello, " . $_POST['my_name'];
}

// 顯示表單
function show_form()
{
	print <<<_HTML_
	<form method="POST" action="$_SERVER[PHP_SELF]">
		Your name: <input type="text" name="my_name">
		<br/>
		<input type="submit" value="Say Hello">
	</form>
	_HTML_;
}

// 驗證表單
function validate_form()
{
	// my_name長度是不是大於3個字
	if (strlen($_POST['my_name']) < 3) {
		return false;
	} else {
		return true;
	}
}
