<!-- 簡化的去除空白與計算字串長度 -->
<?php
if (strlen(trim($_POST['zipcode']) != 5)) {
    // trim(): 去掉頭尾空白
    // strlen(): 回傳字串長度
    print "Please enter a zip code that is 5 charaters long.";
}