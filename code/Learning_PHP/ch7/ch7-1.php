<?php
// 表單製作 說聲Hello
// $_SERVER['REQUEST_METHOD'] 表示瀏覽器使用這個頁面時的HTTP方式。 通常是 POST 或 GET
if ('POST' == $_SERVER['REQUEST_METHOD']) {
	print "Hello, " . $_POST['my_name'];
} else {
	// 因為 action="$_SERVER[PHP_SELF]" 所以會回到同一個URL位置
	print <<<_HTML_
	<form method="post" action="$_SERVER[PHP_SELF]">
		Your name: <input type="text" name="my_name">
	<br>
	<input type="submit" value="Say Hello">
	</form>
	_HTML_;
}
