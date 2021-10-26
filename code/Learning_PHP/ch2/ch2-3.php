<?php
// 變數$_POST['zipcode']中裝載了表單欄位
// "zipcode"的值
$zipcode = trim($_POST['zipcode']);
// 變數$zipcode取得去掉
// 頭尾空白的值
$zip_length = strlen($zipcode);
// 如果郵遞區號長度不是5個字元，就顯示警告
if ($zip_length != 5) {
    print "Please enter a zip code that is 5 characters long.";
}
