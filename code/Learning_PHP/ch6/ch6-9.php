<?php
// 例外處理
require "ch6-7.php";

try {
	$dirnk = new Entree('Glass of Milk', 'milk');
	if ($dirnk->hasIngredient('milk')) {
		print "Yummy!";
	}
} catch (Exception $e) {
	print "Couldn't create the drink:" . $e->getMessage();
}
