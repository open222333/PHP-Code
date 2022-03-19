<?php
// 警告模式
// 如果PDO建構子出錯的話會丟出例外
try {
	$db = new PDO('sqlite:/tmp/restaurant.db');
} catch (PDOException $e) {
	print "Could't connect: " . $e->getMessage();
}
$result = $db->exec(
	"INSERT INTO dishes (dish_size ,dish_name, price, is_spicy) VALUES ('Sesame Seed Puff', 2.50, 0)"
);
if (false === $result) {
	$error = $db->errorInfo();
	print "Could't insert!\n";
	print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
}