<?php
// 使用implode()印HTML 表格
$dimsum = array('Chicken Bun', 'Stuffed Duck Web', 'Trunip Cake');
print '<tr><td>' . implode('</td><td>', $dimsum) . '</td></tr>';
