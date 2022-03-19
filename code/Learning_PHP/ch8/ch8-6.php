<?php
// 使用exec()加入資料
try {
	$db = new PDO('sqlite:/tmp/restaurant.db');
	// 執行query 遇上錯誤也拋出例外	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// ch8-4.php
	// $q = $db->exec(
	// 	"CREATE TABLE dishes (
	// 	dish_id INTEGER PRIMARY KEY,
	// 	dish_name VARCHAR(255),
	// 	price DECIMAL(4,2),
	// 	is_spicy INT)"
	// );
	$affectedRows = $db->exec(
		"INSERT INTO dishes (
			dish_name, price, is_spicy
		) VALUES ('Sesame Seed Puff', 2.50, 0)"
	);
} catch (PDOException $e) {
	print "Could't create table: " . $e->getMessage();
}
