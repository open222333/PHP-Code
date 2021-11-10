<!-- 用substr()取得字串 -->
<?php
// substr() 取得 $_POST['comments']從0位置開始的30個字元
print substr($_POST['comments'], 0, 30);
// 加入省略號
print '...';
