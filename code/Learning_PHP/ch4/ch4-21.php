<?php
// 使用 implode() 把陣列印成字串
$dimsum = array('Chicken Bun', 'Stuffed Duck Web', 'Trunip Cake');
$menu = implode(', ', $dimsum);
print $menu;
