<?php
// 呼叫有兩個參數的函式
function page_header4($color, $title)
{
	print '<html><head><title>Welcome to' . $title . '</title></head>';
	print '<body bgcolor="#"' . $color . '>';
}

page_header4('66cc66', 'my hompage');
