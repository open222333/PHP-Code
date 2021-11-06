<!-- 不分大小寫的字串比較 -->
<?php
// strcasecmp():忽略大小寫做比較
if (strcasecmp($_POST['email'], 'test@excample.com')) {
    print "Welcome";
}
