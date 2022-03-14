<?php
// 轉換HTML中的字元
$comments = htmlentities($_POST['comments']);
print $comments;
