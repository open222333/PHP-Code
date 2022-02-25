<?php
// 函式定義寫在呼叫前後
function page_header()
{
	print '<html><head><title>Welcome to my site</title></head>';
	print '<body bgcolor="#ffffff">';
}

page_header();
print "Welcome, $user";
print "</body></html>";
page_footer();

function page_footer()
{
	print '<hr>Thanks for visiting.';
	print '</body></html>';
}
