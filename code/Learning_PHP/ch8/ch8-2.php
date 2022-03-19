<?php
// catch連線錯誤
try {
	$db = new PDO('mysql:host=db.example.com;dbname=restaurant', 'penguin', 'top^hat');
	// 此處放些用$db 做事的程式碼
} catch (PDOException $e) {
	print "Could't connect to the database: " . $e->getMessage();
}
