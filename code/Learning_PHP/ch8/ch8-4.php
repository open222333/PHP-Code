<?php
// 送 CREATE TABLE 命令給資料庫程式
try {
	$db = new PDO('sqlite:/tmp/restaurant.db');
	// 執行query 遇上錯誤也拋出例外	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$q = $db->exec(
		"CREATE TABLE dishes (
		dish_id INTEGER PRIMARY KEY,
		dish_name VARCHAR(255),
		price DECIMAL(4,2),
		is_spicy INT)"
	);
} catch (PDOException $e) {
	print "Could't create table: " . $e->getMessage();
}
