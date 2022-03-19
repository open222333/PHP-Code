<?php
// 檢查exec()錯誤
// 故意放錯 dish_size
try {
	$db = new PDO('sqlite:/tmp/restaurant.db');
	// 執行query 遇上錯誤也拋出例外
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$affectedRows = $db->exec(
		"INSERT INTO dishes (
			dish_size ,dish_name, price, is_spicy
		) VALUES ('Sesame Seed Puff', 2.50, 0)"
	);
} catch (PDOException $e) {
	print "Could't create table: " . $e->getMessage();
}
