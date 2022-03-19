<?php
// 執行exec()刪除資料
try {
	$db = new PDO('sqlite:/tmp/restaurant.db');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 刪除太貴的菜
	if ($make_things_cheaper) {
		$db->exec("DELETE FROM dishes WHERE price > 19.95");
	} else {
		// 刪除所有的菜
		$db->exec("DELETE FROM dishes");
	}
} catch (PDOException $e) {
	print "Couldn't delete rows: " . $e->getMessage();
}