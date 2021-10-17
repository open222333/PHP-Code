<!-- 顯示表單或祝賀詞 -->
<!-- 合併範例1-3 1-4 -->
<?php
// 如果表單送出後印出祝賀詞
if ($_POST['user']) {
    print "Hello, ";
    // 印出被送出表單中"user"欄位的值
    print $_POST['user'];
    print "!";
} else {
    // 未送出 就顯示表單
    print <<<_HTML_
    <form method="post" action="$_SERVER[PHP_SELF]">
        Your Name: <input type: "text" name="user" /><br />
        <button type="sumbit">Say Hello</button>
    </form>
_HTML_;
}
?>