<?php
// 執行exec()改變資料
try {
	$db = new PDO('sqlite:/tmp/restaurant.db');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// Eggplant with Chili Sauce 改成辣的
	// 如果不在乎有幾列被變動 就不用在乎回傳值
	$db->exec("UPDATE dishes SET is_spicy = 1 WHERE dish_name = 'Eggplant with Chili Sauce'");
	$db->exec("UPDATE dishes SET is_spicy = 1, price=price * 2 WHERE dish_name = 'Lobster with Chili Sauce'");
} catch (PDOException $e) {
	print "Couldn't insert a row: " . $e->getMessage();
}