<?php
// 得知受UPDATE或DELETE影響多少資料列
// 改變菜的價格
$count = $db->exec("UPDATE dishes SET price = price + 5 WHERE price > 3");
print 'Change the price of ' . $count . 'rows.';
