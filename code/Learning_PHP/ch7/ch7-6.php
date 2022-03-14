
<?php
// 用函式印出Hello
// 識別request方法以執行對應工作
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	process_form();
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
