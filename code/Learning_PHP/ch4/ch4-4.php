<?php
// 陣列與變數名稱衝突

// 使$vegetables變成 陣列
$vegetables['corn'] = 'yellow';
// 抹去corn、yellow鍵值，並使$vegetables變成變數
$vegetables = 'delicious';

$fruits = 283;
$fruits['potassium'] = 'banana'; // 會提出警告 但$fruits依舊是283
// 以下會複寫$fruits並使他成為陣列
$fruits = array('potassium' => 'banana');
