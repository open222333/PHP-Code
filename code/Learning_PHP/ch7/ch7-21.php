<?php
// HTML與JavaScript
// 避免跨站腳本攻擊(cross-site scripting attack)

// 從留言中移除HTML strip_tags()
$comments = strip_tags($_POST['comments']);
print $comments;
