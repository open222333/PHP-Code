<?php
print <<<_HTML_
<form method="post" action="$_SERVER[PHP_SELF]">
    Your Name: <input type: "text" name="user" /><br />
    <button type="sumbit">Say Hello</button>
</form>
_HTML_;
// here document(heredoc)語法：<<<_HTML_與_HTML_之間的東西;
// $_SERVER[PHP_SELF]：特殊PHP變數 存了目前頁面的URL。假設目前頁面URL為 http://www.example.com/user/enter.php，$_SERVER[PHP_SELF]的值為 /user/enter.php