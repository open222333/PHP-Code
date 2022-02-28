<?php
// 選項參數
// 預設值參數要放在最後
function page_header5($color, $title, $header = 'Welcome')
{
	print '<html><head><title>Welcome to' . $title . '</title></head>';
	print '<body bgcolor="#"' . $color . '>';
	print "<h1>$header</h1>";
}

// 呼叫方法
page_header5('66cc99', 'my wonderful page');
page_header5('66cc99', 'my wonderful page', 'This page is great!');

// 兩個預設值參數
function page_header6($color, $title = 'the page', $header = 'Welcome')
{
	print '<html><head><title>Welcome to' . $title . '</title></head>';
	print '<body bgcolor="#"' . $color . '>';
	print "<h1>$header</h1>";
}

// 呼叫方法
page_header6('66cc99');
page_header6('66cc99', 'my wonderful page');
page_header6('66cc99', 'my wonderful page', 'This page is great!');

// 全部都用預設參數
function page_header7($color = '336699', $title = 'the page', $header = 'Welcome')
{
	print '<html><head><title>Welcome to' . $title . '</title></head>';
	print '<body bgcolor="#"' . $color . '>';
	print "<h1>$header</h1>";
}

// 呼叫方法
page_header7();
page_header7('66cc99');
page_header7('66cc99', 'my wonderful page');
page_header7('66cc99', 'my wonderful page', 'This page is great!');
